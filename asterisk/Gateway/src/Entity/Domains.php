<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domains
 *
 * @ORM\Table(name="Domains", uniqueConstraints={@ORM\UniqueConstraint(name="domain", columns={"domain"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\DomainsRepository")
 */
class Domains
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
     * @ORM\Column(name="domain", type="string", length=190, nullable=false)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="pointsTo", type="string", length=0, nullable=false, options={"default"="users"})
     */
    private $pointsto = 'users';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getPointsto(): ?string
    {
        return $this->pointsto;
    }

    public function setPointsto(string $pointsto): self
    {
        $this->pointsto = $pointsto;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
