<?php

namespace Pegasus\Gateway\Dialplan;

use Pegasus\Gateway\RouteHandlerAbstract;
use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;
use Pegasus\Gateway\Repository\ExtensionsRepository as ExtensionRepo;

class Headers extends RouteHandlerAbstract {
    protected $agi;

    public function __construct(AgiWrapper $agi, ExtensionRepo $extensionRepo) {
        $this->agi = $agi;
        $this->extensionRepo = $extensionRepo;
    }

    public function process() {
        $extension = $this->extensionRepo->findOneBy(['type' => 'term', 'id' => $this->agi->getEndpoint()]);
        $exten = $this->agi->getExtension();
        $this->agi->setSIPHeader("X-Call-Id", $this->agi->getVariable("CALL_ID"));
        $this->agi->setSIPHeader("X-Info-CompanyId", $extension->getCompany());
        $this->agi->setSIPHeader("X-Info-Callee", $extension->getExtendedNumber());
        $this->agi->setSIPHeader("X-Info-ExtensionId", $extension->getId());
    }
}