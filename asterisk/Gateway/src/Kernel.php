<?php

namespace Pegasus\Gateway;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;
use Symfony\Component\HttpFoundation\Response;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
  
    protected $fastagi;
  
    private const CONFIG_EXTS = '.{php,xml,yaml,yml}';
  
    public function __construct($environment, $debug, $fastagi = null) {
        $this->fastagi = $fastagi;
        return parent::__construct($environment, $debug);
    }
  
    public function getProjectDir(): string {
        return \dirname(__DIR__);
    }
  
    protected function initializeContainer() {
        $response = parent::initializeContainer(...func_get_args());
        $this->container->set('fastagi', $this->fastagi);
    
        return $response;
    }
  
    public function registerBundles(): iterable {
        $contents = require $this->getProjectDir() . '/config/bundles.php';
        foreach ($contents as $class => $envs) {
        if ($envs[$this->environment] ?? $envs['all'] ?? false) {
            yield new $class();
        }
        }
    }
  
    public function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void {
        $container->addResource(new FileResource($this->getProjectDir() . '/config/bundles.php'));
        $container->setParameter('container.dumper.inline_class_loader', \PHP_VERSION_ID < 70400 || $this->debug);
        $container->setParameter('container.dumper.inline_factories', true);
    
        $loader->load($this->getProjectDir() . '/config/{packages}/*' . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getProjectDir() . '/config/{packages}/' . $this->environment . '/*' . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getProjectDir() . '/config/{parameters}' . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getProjectDir() . '/config/{parameters}_' . $this->environment . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getProjectDir() . '/config/{services}' . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getProjectDir() . '/config/{services}_' . $this->environment . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getProjectDir() . '/config/{config}' . self::CONFIG_EXTS, 'glob');
        $loader->load($this->getProjectDir() . '/config/{config}_' . $this->environment . self::CONFIG_EXTS, 'glob');
    
        // Special Loader to load CoreBundle config files
        //$loader->load($this->getProjectDir() . '/../CoreBundle/Resources/config/*' . self::CONFIG_EXTS, 'glob');
    }
  
    protected function configureRoutes(RouteCollectionBuilder $routes): void {
        $routes->import($this->getProjectDir() . '/config/{routes}/' . $this->environment . '/*' . self::CONFIG_EXTS, '/', 'glob');
        $routes->import($this->getProjectDir() . '/config/{routes}/*' . self::CONFIG_EXTS, '/', 'glob');
        $routes->import($this->getProjectDir() . '/config/{routes}' . self::CONFIG_EXTS, '/', 'glob');
    }
}
