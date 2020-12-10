<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersLocationAttrs
 *
 * @ORM\Table(name="kam_users_location_attrs", indexes={@ORM\Index(name="last_modified", columns={"last_modified"}), @ORM\Index(name="username", columns={"username", "domain", "ruid"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersLocationAttrsRepository")
 */
class KamUsersLocationAttrs
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
     * @ORM\Column(name="ruid", type="string", length=64, nullable=false)
     */
    private $ruid;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="domain", type="string", length=190, nullable=true)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="aname", type="string", length=64, nullable=false)
     */
    private $aname;

    /**
     * @var int
     *
     * @ORM\Column(name="atype", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $atype;

    /**
     * @var string
     *
     * @ORM\Column(name="avalue", type="string", length=255, nullable=false)
     */
    private $avalue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=false, options={"default"="1900-01-01 00:00:01"})
     */
    private $lastModified = '1900-01-01 00:00:01';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRuid(): ?string
    {
        return $this->ruid;
    }

    public function setRuid(string $ruid): self
    {
        $this->ruid = $ruid;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(?string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getAname(): ?string
    {
        return $this->aname;
    }

    public function setAname(string $aname): self
    {
        $this->aname = $aname;

        return $this;
    }

    public function getAtype(): ?int
    {
        return $this->atype;
    }

    public function setAtype(int $atype): self
    {
        $this->atype = $atype;

        return $this;
    }

    public function getAvalue(): ?string
    {
        return $this->avalue;
    }

    public function setAvalue(string $avalue): self
    {
        $this->avalue = $avalue;

        return $this;
    }

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->lastModified;
    }

    public function setLastModified(\DateTimeInterface $lastModified): self
    {
        $this->lastModified = $lastModified;

        return $this;
    }


}
