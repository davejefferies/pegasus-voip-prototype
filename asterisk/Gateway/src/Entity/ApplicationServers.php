<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApplicationServers
 *
 * @ORM\Table(name="ApplicationServers", uniqueConstraints={@ORM\UniqueConstraint(name="ip", columns={"ip"}), @ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\ApplicationServersRepository")
 */
class ApplicationServers
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
     * @ORM\Column(name="ip", type="string", length=50, nullable=false)
     */
    private $ip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="setid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $setid;

    /**
     * @var int
     *
     * @ORM\Column(name="flags", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $flags;

    /**
     * @var int
     *
     * @ORM\Column(name="priority", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="attrs", type="string", length=128, nullable=false)
     */
    private $attrs;

    /**
     * @var int
     *
     * @ORM\Column(name="enabled", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $enabled = '1';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSetid(): ?int
    {
        return $this->setid;
    }

    public function setSetid(int $setid): self
    {
        $this->setid = $setid;

        return $this;
    }

    public function getFlags(): ?int
    {
        return $this->flags;
    }

    public function setFlags(int $flags): self
    {
        $this->flags = $flags;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getAttrs(): ?string
    {
        return $this->attrs;
    }

    public function setAttrs(string $attrs): self
    {
        $this->attrs = $attrs;

        return $this;
    }

    public function getEnabled(): ?int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }


}
