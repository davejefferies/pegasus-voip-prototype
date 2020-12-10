<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Codecs
 *
 * @ORM\Table(name="Codecs")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\CodecsRepository")
 */
class Codecs
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
     * @ORM\Column(name="type", type="string", length=0, nullable=false, options={"default"="audio"})
     */
    private $type = 'audio';

    /**
     * @var string
     *
     * @ORM\Column(name="iden", type="string", length=25, nullable=false)
     */
    private $iden;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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


}
