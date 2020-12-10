<?php

namespace Pegasus\Gateway\Dialplan;

use Doctrine\ORM\EntityManagerInterface;
use Pegasus\Gateway\RouteHandlerAbstract;
use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;
use Pegasus\Gateway\Repository\BitCallersRepository as BitCallerRepo;

class Hangup extends RouteHandlerAbstract 
{
    protected $agi;

    public function __construct(EntityManagerInterface $em, AgiWrapper $agi, BitCallerRepo $bitCallerRepo) 
    {
        $this->agi = $agi;
        $this->em = $em;
        $this->bitCallerRepo = $bitCallerRepo;
    }

    public function process() 
    {
        $uniqueid = $this->agi->getUniqueId();
        $this->agi->verbose('Processing Hangup for Unique ID: ' . $uniqueid);
        $caller = $this->bitCallerRepo->findOneBy(['uniqueid' => $uniqueid, 'callback' => 0]);
        if (!empty($caller))
        {
            $this->em->remove($caller);
            $this->em->flush();
        }
    }
}