<?php

namespace Pegasus\Gateway;

use Symfony\Component\HttpFoundation\Response;

abstract class RouteHandlerAbstract {
  abstract function process();
  
  public function run() {
    static::process();
    
    return new Response();
  }
}