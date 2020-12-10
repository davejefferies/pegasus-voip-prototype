<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaRelaySets
 *
 * @ORM\Table(name="MediaRelaySets", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\MediaRelaySetsRepository")
 */
class MediaRelaySets
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
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="setid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $setid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=64, nullable=false)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="weight", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $weight = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="disabled", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $disabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stamp", type="datetime", nullable=false, options={"default"="2000-01-01 00:00:00"})
     */
    private $stamp = '2000-01-01 00:00:00';

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSetId(): ?int
    {
        return $this->setid;
    }

    public function setSetId(int $setid): self
    {
        $this->setid = $setid;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getDisabled(): ?int
    {
        return $this->disabled;
    }

    public function setDisabled(int $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getStamp(): ?\DateTimeInterface
    {
        return $this->stamp;
    }

    public function setStamp(\DateTimeInterface $stamp): self
    {
        $this->stamp = $stamp;

        return $this;
    }


}
