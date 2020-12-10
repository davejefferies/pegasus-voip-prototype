<?php

namespace Pegasus\Gateway\Dialplan;

use Pegasus\Gateway\RouteHandlerAbstract;
use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;
use Pegasus\Gateway\Action\Service as ServiceAction;
use Pegasus\Gateway\Repository\CompanyServicesRepository as ServiceRepo;
use Pegasus\Gateway\Repository\ExtensionsRepository as ExtensionRepo;
use Pegasus\Gateway\Repository\KamUsersLocationRepository as KamUserLocationRepo;
use Pegasus\Gateway\Action\Router as RouterAction;

class Extensions extends RouteHandlerAbstract 
{
    protected $agi;

    public function __construct(AgiWrapper $agi, ServiceAction $serviceAction, ServiceRepo $serviceRepo, ExtensionRepo $extensionRepo, KamUserLocationRepo $kamUserLocationRepo, RouterAction $routerAction) 
    {
        $this->agi = $agi;
        $this->serviceAction = $serviceAction;
        $this->serviceRepo = $serviceRepo;
        $this->extensionRepo = $extensionRepo;
        $this->kamUserLocationRepo = $kamUserLocationRepo;
        $this->routerAction = $routerAction;
    }

    public function process() 
    {
        $num = $this->agi->getCallerIdNum();
        $src = $this->extensionRepo->findOneBy(['extendednumber' => $num]);
        if (empty($src))
        {
            return $this->agi->error("Could not find an extensions for the call from $num");
        }
        $dst = $this->agi->getExtension();
        $dstExt = $this->extensionRepo->findOneBy(['extendednumber' => $dst]);
        if (strpos($dst, '*') == 0) {
            $srv = $this->serviceRepo->findOneBy(['company' => $src->getCompany()->getId(), 'code' => str_replace("*", "", $dst)]);
            $this->serviceAction->setExtension($src)->setDestination($dst)->setService(array_filter($srv, function($i) {
                return $i->getCode() == str_replace("*", "", $dst);
            }))->process();
        } else if ($this->kamUserLocationRepo->getCount($dst) == 0 && $dstExt->getType() == 'term') {
            return $this->routerAction->setType('voicemail')->setSource($src)->setDestination($dstExt)->process();
        } else if (!is_null($dstExt)) {
            return $this->routerAction->setType($dstExt->getType())->setSource($src)->setDestination($dstExt)->process();
        }
    }
}