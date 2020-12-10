<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TerminalManufacturers
 *
 * @ORM\Table(name="TerminalManufacturers", uniqueConstraints={@ORM\UniqueConstraint(name="iden", columns={"iden"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\TerminalManufacturersRepository")
 */
class TerminalManufacturers
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


}
