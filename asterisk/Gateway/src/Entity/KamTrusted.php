<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamTrusted
 *
 * @ORM\Table(name="kam_trusted", uniqueConstraints={@ORM\UniqueConstraint(name="src_ip", columns={"src_ip"})}, indexes={@ORM\Index(name="companyId", columns={"companyId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamTrustedRepository")
 */
class KamTrusted
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
     * @var string|null
     *
     * @ORM\Column(name="src_ip", type="string", length=50, nullable=true)
     */
    private $srcIp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="proto", type="string", length=4, nullable=true)
     */
    private $proto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="from_pattern", type="string", length=64, nullable=true)
     */
    private $fromPattern;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ruri_pattern", type="string", length=64, nullable=true)
     */
    private $ruriPattern;

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
     * @var int
     *
     * @ORM\Column(name="priority", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $priority;

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

    public function getSrcIp(): ?string
    {
        return $this->srcIp;
    }

    public function setSrcIp(?string $srcIp): self
    {
        $this->srcIp = $srcIp;

        return $this;
    }

    public function getProto(): ?string
    {
        return $this->proto;
    }

    public function setProto(?string $proto): self
    {
        $this->proto = $proto;

        return $this;
    }

    public function getFromPattern(): ?string
    {
        return $this->fromPattern;
    }

    public function setFromPattern(?string $fromPattern): self
    {
        $this->fromPattern = $fromPattern;

        return $this;
    }

    public function getRuriPattern(): ?string
    {
        return $this->ruriPattern;
    }

    public function setRuriPattern(?string $ruriPattern): self
    {
        $this->ruriPattern = $ruriPattern;

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

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

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
