<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TerminalModels
 *
 * @ORM\Table(name="TerminalModels", uniqueConstraints={@ORM\UniqueConstraint(name="iden", columns={"iden"})}, indexes={@ORM\Index(name="terminalManufacturerId", columns={"terminalManufacturerId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\TerminalModelsRepository")
 */
class TerminalModels
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
     * @ORM\Column(name="iden", type="string", length=100, nullable=false)
     */
    private $iden;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genericTemplate", type="text", length=65535, nullable=true)
     */
    private $generictemplate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genericUrlPattern", type="string", length=255, nullable=true)
     */
    private $genericurlpattern;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specificUrlPattern", type="string", length=255, nullable=true)
     */
    private $specificurlpattern;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specificTemplate", type="text", length=65535, nullable=true)
     */
    private $specifictemplate;

    /**
     * @var \TerminalManufacturers
     *
     * @ORM\ManyToOne(targetEntity="TerminalManufacturers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="terminalManufacturerId", referencedColumnName="id")
     * })
     */
    private $terminalmanufacturer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIden(): ?string
    {
        return $this->iden;
    }

    public function setIden(string $iden): self
    {
        $this->iden = $iden;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGenericTemplate(): ?string
    {
        return $this->generictemplate;
    }

    public function setGenericTemplate(?string $generictemplate): self
    {
        $this->generictemplate = $generictemplate;

        return $this;
    }

    public function getGenericUrlPattern(): ?string
    {
        return $this->genericurlpattern;
    }

    public function setGenericUrlPattern(?string $genericurlpattern): self
    {
        $this->genericurlpattern = $genericurlpattern;

        return $this;
    }

    public function getSpecificUrlPattern(): ?string
    {
        return $this->specificurlpattern;
    }

    public function setSpecificUrlPattern(?string $specificurlpattern): self
    {
        $this->specificurlpattern = $specificurlpattern;

        return $this;
    }

    public function getSpecificTemplate(): ?string
    {
        return $this->specifictemplate;
    }

    public function setSpecificTemplate(?string $specifictemplate): self
    {
        $this->specifictemplate = $specifictemplate;

        return $this;
    }

    public function getTerminalManufacturer(): ?TerminalManufacturers
    {
        return $this->terminalmanufacturer;
    }

    public function setTerminalManufacturer(?TerminalManufacturers $terminalmanufacturerid): self
    {
        $this->terminalmanufacturer = $terminalmanufacturerid;

        return $this;
    }


}
