<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConferenceRooms
 *
 * @ORM\Table(name="ConferenceRooms", uniqueConstraints={@ORM\UniqueConstraint(name="extensionId", columns={"extensionId", "number"})}, indexes={@ORM\Index(name="IDX_7CE9259912AB7F65", columns={"extensionId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\ConferenceRoomsRepository")
 */
class ConferenceRooms
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
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pinAdmin", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $pinadmin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pinGuest", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $pinguest;

    /**
     * @var int|null
     *
     * @ORM\Column(name="maxMembers", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $maxmembers;

    /**
     * @var \Extensions
     *
     * @ORM\ManyToOne(targetEntity="Extensions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="extensionId", referencedColumnName="id")
     * })
     */
    private $extension;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPinAdmin(): ?int
    {
        return $this->pinadmin;
    }

    public function setPinAdmin(?int $pinadmin): self
    {
        $this->pinadmin = $pinadmin;

        return $this;
    }

    public function getPinGuest(): ?int
    {
        return $this->pinguest;
    }

    public function setPinGuest(?int $pinguest): self
    {
        $this->pinguest = $pinguest;

        return $this;
    }

    public function getMaxMembers(): ?int
    {
        return $this->maxmembers;
    }

    public function setMaxMembers(?int $maxmembers): self
    {
        $this->maxmembers = $maxmembers;

        return $this;
    }

    public function getExtension(): ?Extensions
    {
        return $this->extension;
    }

    public function setExtension(?Extensions $extensionid): self
    {
        $this->extension = $extensionid;

        return $this;
    }


}
