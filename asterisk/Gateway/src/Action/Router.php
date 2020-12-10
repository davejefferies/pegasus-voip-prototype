<?php

namespace Pegasus\Gateway\Action;

use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;

class Router 
{
    public function __construct(AgiWrapper $agi, TermCall $termCallAction, ConferenceCall $confCallAction, QueueCall $queueCallAction)
    {
        $this->agi = $agi;
        $this->termCallAction = $termCallAction;
        $this->confCallAction = $confCallAction;
        $this->queueCallAction = $queueCallAction;
    }

    public function setSource($src) {
        $this->source = $src;
        return $this;
    }

    public function setDestination($dst) {
        $this->destination = $dst;
        return $this;
    }
    
    public function setType($type) {
        $this->type = $type; 
        return $this;
    }

    public function process() {
        switch($this->type) {
            case 'conference':
                $this->confCallAction->setSource($this->source)->setDestination($this->destination)->process();
                break;
            case 'term':
                $this->termCallAction->setSource($this->source)->setDestination($this->destination)->process();
                break;
            case 'queue':
                $this->queueCallAction->setSource($this->source)->setDestination($this->destination)->process();
            break;
            case 'voicemail':
                $this->voicemail();
                break;
            default:
                break;
        }
    }

    public function voicemail() {
        $this->agi->verbose("Sending " . $this->source->getExtendedNumber() . " to the voicemail for " . $this->destination->getExtendedNumber());
        return $this->agi->voicemail($this->destination->getExtendedNumber(), 'company' . $this->destination->getCompany()->getId());
    }

    /*public function conferenceCall() {
        $this->agi->verbose('Conference Call.');
        $this->agi->answer();
        $this->agi->readText('Please enter the room number followed by the # key.');
        $result = $this->agi->getData('beep', 3000, 2);
        $keys = $result['result'];
        $this->agi->sayDigits($keys);
    }*/

    /*public function terminalCall() {
        $endpoint = $this->endpointRepo->findOneBy(['extension' => $this->destination->getId()]);
        $extensionSettings = $this->destination->getTermSetting();
        $this->agi->setExtensionId($this->source->getId());
        $this->agi->setChannelCaller($this->source->getLabel());
        $this->agi->setChannelOrigin($this->source->getLabel());
        $this->agi->setCompanyId($this->source->getCompany()->getid());
        $this->agi->setChannelLanguage($this->source->getCompany()->getLanguage()->getIden());
        $this->agi->setChannelMusic('default');
        $this->agi->setDialExt($this->destination->getExtendedNumber());
        if (is_null($endpoint)) {
            return $this->agi->error("Could not find an endpoint.");
        }
        $this->agi->setDialDst($endpoint->getId());
        $this->agi->setDialEndpoint($endpoint->getId());
        $options = '';
        if (is_null($extensionSettings)) {
            $this->agi->setDialTimeout(10);
        } else {
            $this->agi->setDialTimeout($extensionSettings->getNoAnswerTimeout());
            if ($extensionSettings->getRecording() == 0) {
                $options .= 'xX';
            }
        }
        $this->agi->setDialOpts($options);
        $this->agi->redirect('call-extension', $this->destination->getExtendedNumber());
    }*/
}