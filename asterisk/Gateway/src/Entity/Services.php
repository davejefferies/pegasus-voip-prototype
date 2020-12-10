<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="Services")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\ServicesRepository")
 */
class Services
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
     * @ORM\Column(name="iden", type="string", length=50, nullable=false)
     */
    private $iden;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="defaultCode", type="string", length=3, nullable=false)
     */
    private $defaultcode;

    /**
     * @var int
     *
     * @ORM\Column(name="extraArgs", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $extraargs;

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

    public function getDefaultCode(): ?string
    {
        return $this->defaultcode;
    }

    public function setDefaultCode(string $defaultcode): self
    {
        $this->defaultcode = $defaultcode;

        return $this;
    }

    public function getExtraArgs(): ?int
    {
        return $this->extraargs;
    }

    public function setExtraArgs(int $extraargs): self
    {
        $this->extraargs = $extraargs;

        return $this;
    }


}
