<?php

namespace Pegasus\Gateway\Action;

use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;

class TermCall 
{
    public function __construct(AgiWrapper $agi)
    {
        $this->agi = $agi;
    }

    public function setSource($src) {
        $this->source = $src;
        return $this;
    }

    public function setDestination($dst) {
        $this->destination = $dst;
        return $this;
    }

    public function process()
    {
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
        $this->agi->setDialDst($this->destination->getId());
        $this->agi->setDialEndpoint($destination->getId());
        $options = '';
        if (is_null($this->destination->getTermSetting()) || is_null($this->destination->getTermSetting()->getNoAnswerTimeout())) {
            $this->agi->setDialTimeout(10);
        } else {
            $this->agi->setDialTimeout($this->destination->getTermSetting()->getNoAnswerTimeout());
            if ($this->destination->getTermSetting()->getRecording() == 0) {
                $options .= 'xX';
            }
        }
        $this->agi->setDialOpts($options);
        $this->agi->redirect('call-extension', $this->destination->getExtendedNumber());
    }
}