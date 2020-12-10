<?php

namespace Pegasus\Gateway\Action;

use Doctrine\ORM\EntityManagerInterface;
use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;
use Pegasus\Gateway\Repository\BitCallersRepository as BitCallerRepo;
use Pegasus\Gateway\Entity\BitCallers as BitCaller;

class QueueCall
{
    public function __construct(EntityManagerInterface $em, AgiWrapper $agi, BitcallerRepo $bitCallerRepo)
    {
        $this->agi = $agi;
        $this->bitCallerRepo = $bitCallerRepo;
        $this->em = $em;
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
        $caller = new BitCaller();
        $caller->setQueue($this->destination);
        $this->agi->verbose($this->agi->getUniqueId());
        $caller->setUniqueId($this->agi->getUniqueId());
        $this->em->persist($caller);
        $this->em->flush();
        $this->agi->verbose('Queue Call from ' . $this->source->getExtendedNumber() . ' to ' . $this->destination->getExtendedNumber() . '. Unique ID: ' . $this->agi->getUniqueId());
        $this->agi->setQueueId($this->destination->getId());
        $this->agi->setQueueName($this->destination->getLabel());
        $this->agi->redirect('call-queue');
    }
}