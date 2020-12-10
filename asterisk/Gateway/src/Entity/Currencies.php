<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currencies
 *
 * @ORM\Table(name="Currencies", uniqueConstraints={@ORM\UniqueConstraint(name="iden", columns={"iden"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\CurrenciesRepository")
 */
class Currencies
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
     * @ORM\Column(name="iden", type="string", length=10, nullable=false)
     */
    private $iden;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=5, nullable=false)
     */
    private $symbol;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=false)
     */
    private $name;

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

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;

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


}
