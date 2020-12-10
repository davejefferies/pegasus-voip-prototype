<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QueueSettings
 *
 * @ORM\Table(name="QueueSettings", indexes={@ORM\Index(name="periodicAnnounceLocutionId", columns={"periodicAnnounceLocutionId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\QueueSettingsRepository")
 */
class QueueSettings
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="strategy", type="string", length=0, nullable=true)
     */
    private $strategy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight;

    /**
     * @var int|null
     *
     * @ORM\Column(name="periodicAnnounceFrequency", type="integer", nullable=true)
     */
    private $periodicannouncefrequency;

    /**
     * @var \Locutions
     *
     * @ORM\ManyToOne(targetEntity="Locutions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="periodicAnnounceLocutionId", referencedColumnName="id")
     * })
     */
    private $periodicannouncelocutionid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStrategy(): ?string
    {
        return $this->strategy;
    }

    public function setStrategy(?string $strategy): self
    {
        $this->strategy = $strategy;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPeriodicAnnounceFrequency(): ?int
    {
        return $this->periodicannouncefrequency;
    }

    public function setPeriodicAnnounceFrequency(?int $periodicannouncefrequency): self
    {
        $this->periodicannouncefrequency = $periodicannouncefrequency;

        return $this;
    }

    public function getPeriodicAnnounceLocution(): ?Locutions
    {
        return $this->periodicannouncelocutionid;
    }

    public function setPeriodicAnnounceLocution(?Locutions $periodicannouncelocutionid): self
    {
        $this->periodicannouncelocutionid = $periodicannouncelocutionid;

        return $this;
    }


}
