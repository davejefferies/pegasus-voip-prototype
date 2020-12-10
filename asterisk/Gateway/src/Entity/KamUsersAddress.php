<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersAddress
 *
 * @ORM\Table(name="kam_users_address", indexes={@ORM\Index(name="companyId", columns={"companyId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersAddressRepository")
 */
class KamUsersAddress
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
     * @ORM\Column(name="source_address", type="string", length=100, nullable=false)
     */
    private $sourceAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip_addr", type="string", length=50, nullable=true)
     */
    private $ipAddr;

    /**
     * @var int
     *
     * @ORM\Column(name="mask", type="integer", nullable=false, options={"default"="32","unsigned"=true})
     */
    private $mask = '32';

    /**
     * @var int
     *
     * @ORM\Column(name="port", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $port;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag", type="string", length=64, nullable=true)
     */
    private $tag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @var \Companies
     *
     * @ORM\ManyToOne(targetEntity="Companies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="companyId", referencedColumnName="id")
     * })
     */
    private $companyid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSourceAddress(): ?string
    {
        return $this->sourceAddress;
    }

    public function setSourceAddress(string $sourceAddress): self
    {
        $this->sourceAddress = $sourceAddress;

        return $this;
    }

    public function getIpAddr(): ?string
    {
        return $this->ipAddr;
    }

    public function setIpAddr(?string $ipAddr): self
    {
        $this->ipAddr = $ipAddr;

        return $this;
    }

    public function getMask(): ?int
    {
        return $this->mask;
    }

    public function setMask(int $mask): self
    {
        $this->mask = $mask;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(?string $tag): self
    {
        $this->tag = $tag;

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

    public function getCompany(): ?Companies
    {
        return $this->companyid;
    }

    public function setCompany(?Companies $companyid): self
    {
        $this->companyid = $companyid;

        return $this;
    }


}
