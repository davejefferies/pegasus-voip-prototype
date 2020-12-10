<?php

use Symfony\Component\HttpFoundation\Request;
use Pegasus\Gateway\Kernel;

require __DIR__ . '/../vendor/autoload.php';

$env = getenv('SYMFONY_ENV') ?: 'dev';
$debug = getenv('SYMFONY_DEBUG') !== '0';
//$array = explode('/', $argx['command']);
//$array = array_map(function($word) { return ucfirst(strtolower($word)); }, $array);
//$cmd = join('/', $array);
$cmd = "Pegasus/Gateway/" . $argx['command'];
$fastagi->verbose($cmd);
$kernel = new Kernel($env, false, $fastagi);
$request = Request::create($cmd, 'GET');

$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);