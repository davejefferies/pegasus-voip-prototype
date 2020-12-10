<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timezones
 *
 * @ORM\Table(name="Timezones", indexes={@ORM\Index(name="countryId", columns={"countryId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\TimezonesRepository")
 */
class Timezones
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
     * @var string
     *
     * @ORM\Column(name="tz", type="string", length=255, nullable=false)
     */
    private $tz;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="string", length=150, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="id")
     * })
     */
    private $countryid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTz(): ?string
    {
        return $this->tz;
    }

    public function setTz(string $tz): self
    {
        $this->tz = $tz;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

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

    public function getCountry(): ?Countries
    {
        return $this->countryid;
    }

    public function setCountry(?Countries $countryid): self
    {
        $this->countryid = $countryid;

        return $this;
    }


}
