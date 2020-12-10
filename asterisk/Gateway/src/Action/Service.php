<?php

namespace Pegasus\Gateway\Action;

use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;
use Pegasus\Gateway\Repository\ServicesRepository as ServiceRepo;

class Service 
{
    public function __construct(AgiWrapper $agi, ServiceRepo $serviceRepo)
    {
        $this->agi = $agi;
        $this->serviceRepo = $serviceRepo;
    }

    public function setDestination($dst)
    {
        $this->destination = $dst;
        return $this;
    }

    public function setExtension($exten)
    {
        $this->extension = $exten;
        return $this;
    }

    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    public function process()
    {
        $this->agi->verbose('Extension: ' . $this->extension->getId());
        $this->agi->verbose('Service: ' . count($this->service));
        $service = $this->serviceRepo->findOneBy(['defaultcode' => str_replace("*", "", $this->destination)]);
        if (is_null($this->service))
        {
            $this->service = $service;
        }
        else
        {
            $this->service = $this->service->getService();
        }
        if (is_null($this->service))
        {
            return $this->agi->error("Could not find service for " . $this->destination);
        }
        $this->agi->notice("Processing Service for " . $this->destination);
        switch ($this->service->getIden()) {
            case "Voicemail":
                $this->processVoicemail();
                break;
            default:
                break;
        }
    }

    private function processVoicemail() {
        $voicemail = $this->extension->getVoicemailSetting();
        if (is_null($voicemail) || $voicemail->getEnabled() == 0) {
            return $this->agi->error('Voicemail is not enabled for ' . $this->extension->getExtendedNumber());
        }
        if ($voicemail->getEnabled() == 0) {
            return $this->agi->error('Voicemail for ' . $this->extension->getExtendedNumber() . ' is not enabled.');
        }
        $this->agi->notice('Checking voicemail for ' . $this->extension->getExtendedNumber());
        $this->agi->checkVoicemail($this->extension->getExtendedNumber(), 'company' . $this->extension->getId());
    }
}