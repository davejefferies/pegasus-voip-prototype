<?php

namespace Pegasus\Gateway\Action;

use Pegasus\Gateway\Agi\Wrapper as AgiWrapper;
use Pegasus\Gateway\Repository\ConferenceRoomsRepository as RoomRepo;

class ConferenceCall 
{
    public function __construct(AgiWrapper $agi, RoomRepo $roomRepo)
    {
        $this->agi = $agi;
        $this->roomRepo = $roomRepo;
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
        $this->agi->verbose('Conference Call from ' . $this->source->getExtendedNumber() . ' to ' . $this->destination->getExtendedNumber() . '.');
        $this->agi->answer();
        $this->agi->readText('Please enter the room number followed by the # key.');
        $result = $this->agi->getData('beep', 3000, 2);
        $keys = $result['result'];
        $room = $this->roomRepo->findOneBy(['extension' => $this->destination->getId(), 'number' => $keys]);
        if (empty($room)) {
            return $this->agi->error("Conference Room $keys is not properly defined. Check configuration.");
        }
        $this->agi->verbose("Processing the conference room " . $room->getName() . "(#" . $room->getId() . ")");
        $this->agi->setConnectedLine('name', $room->getName());
        if ($room->getPinGuest()) {
            $this->agi->setConferenceSetting('user,pin', $room->getPinGuest());
        }
        if ($room->getMaxMembers()) {
            $this->agi->setConferenceSetting('bridge,max_members', $room->getMaxMembers());
        }
        $this->agi->setConferenceSetting('bridge,video_mode', 'follow_talker');
        $this->agi->redirect('call-conference', $room->getId());
    }
}