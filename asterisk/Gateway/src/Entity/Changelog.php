<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Changelog
 *
 * @ORM\Table(name="Changelog")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\ChangelogRepository")
 */
class Changelog
{
    /**
     * @var int
     *
     * @ORM\Column(name="change_number", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $changeNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="delta_set", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $deltaSet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_dt", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $startDt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="complete_dt", type="datetime", nullable=true)
     */
    private $completeDt;

    /**
     * @var string
     *
     * @ORM\Column(name="applied_by", type="string", length=100, nullable=false)
     */
    private $appliedBy;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    public function getChangeNumber(): ?string
    {
        return $this->changeNumber;
    }

    public function getDeltaSet(): ?string
    {
        return $this->deltaSet;
    }

    public function getStartDt(): ?\DateTimeInterface
    {
        return $this->startDt;
    }

    public function setStartDt(\DateTimeInterface $startDt): self
    {
        $this->startDt = $startDt;

        return $this;
    }

    public function getCompleteDt(): ?\DateTimeInterface
    {
        return $this->completeDt;
    }

    public function setCompleteDt(?\DateTimeInterface $completeDt): self
    {
        $this->completeDt = $completeDt;

        return $this;
    }

    public function getAppliedBy(): ?string
    {
        return $this->appliedBy;
    }

    public function setAppliedBy(string $appliedBy): self
    {
        $this->appliedBy = $appliedBy;

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


}
