<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConferenceSettings
 *
 * @ORM\Table(name="ConferenceSettings")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\ConferenceSettingsRepository")
 */
class ConferenceSettings
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }


}
