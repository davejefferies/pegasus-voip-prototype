<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MusicOnHold
 *
 * @ORM\Table(name="MusicOnHold", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name", "companyId"})}, indexes={@ORM\Index(name="companyId", columns={"companyId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\MusicOnHoldRepository")
 */
class MusicOnHold
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="originalFileFileSize", type="integer", nullable=true, options={"unsigned"=true,"comment"="[FSO:keepExtension]"})
     */
    private $originalfilefilesize;

    /**
     * @var string|null
     *
     * @ORM\Column(name="originalFileMimeType", type="string", length=80, nullable=true)
     */
    private $originalfilemimetype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="originalFileBaseName", type="string", length=255, nullable=true)
     */
    private $originalfilebasename;

    /**
     * @var int|null
     *
     * @ORM\Column(name="encodedFileFileSize", type="integer", nullable=true, options={"unsigned"=true,"comment"="[FSO:keepExtension|storeInBaseFolder]"})
     */
    private $encodedfilefilesize;

    /**
     * @var string|null
     *
     * @ORM\Column(name="encodedFileMimeType", type="string", length=80, nullable=true)
     */
    private $encodedfilemimetype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="encodedFileBaseName", type="string", length=255, nullable=true)
     */
    private $encodedfilebasename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true, options={"comment"="[enum:pending|encoding|ready|error]"})
     */
    private $status;

    /**
     * @var \Companies
     *
     * @ORM\ManyToOne(targetEntity="Companies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="companyId", referencedColumnName="id")
     * })
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOriginalFileFileSize(): ?int
    {
        return $this->originalfilefilesize;
    }

    public function setOriginalFileFileSize(?int $originalfilefilesize): self
    {
        $this->originalfilefilesize = $originalfilefilesize;

        return $this;
    }

    public function getOriginalFileMimeType(): ?string
    {
        return $this->originalfilemimetype;
    }

    public function setOriginalFileMimeType(?string $originalfilemimetype): self
    {
        $this->originalfilemimetype = $originalfilemimetype;

        return $this;
    }

    public function getOriginalFileBaseName(): ?string
    {
        return $this->originalfilebasename;
    }

    public function setOriginalFileBaseName(?string $originalfilebasename): self
    {
        $this->originalfilebasename = $originalfilebasename;

        return $this;
    }

    public function getEncodedFileFileSize(): ?int
    {
        return $this->encodedfilefilesize;
    }

    public function setEncodedFileFileSize(?int $encodedfilefilesize): self
    {
        $this->encodedfilefilesize = $encodedfilefilesize;

        return $this;
    }

    public function getEncodedFileMimeType(): ?string
    {
        return $this->encodedfilemimetype;
    }

    public function setEncodedFileMimeType(?string $encodedfilemimetype): self
    {
        $this->encodedfilemimetype = $encodedfilemimetype;

        return $this;
    }

    public function getEncodedFileBaseName(): ?string
    {
        return $this->encodedfilebasename;
    }

    public function setEncodedFileBaseName(?string $encodedfilebasename): self
    {
        $this->encodedfilebasename = $encodedfilebasename;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCompany(): ?Companies
    {
        return $this->company;
    }

    public function setCompany(?Companies $companyid): self
    {
        $this->company = $companyid;

        return $this;
    }


}
