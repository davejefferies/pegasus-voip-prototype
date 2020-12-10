<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BitCallers
 *
 * @ORM\Table(name="bit_callers", uniqueConstraints={@ORM\UniqueConstraint(name="uniqueid", columns={"uniqueid"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\BitCallersRepository")
 */
class BitCallers
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
     * @ORM\Column(name="uniqueid", type="string", length=50, nullable=false)
     */
    private $uniqueid;

    /**
     * @var int
     *
     * @ORM\Column(name="callback", type="integer", nullable=false)
     */
    private $callback = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=25, nullable=false)
     */
    private $number = '';

    /**
     * @var \Extensions
     *
     * @ORM\ManyToOne(targetEntity="Extensions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="queueId", referencedColumnName="id")
     * })
     */
    private $queueid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUniqueId(): ?string
    {
        return $this->uniqueid;
    }

    public function setUniqueId(string $uniqueid): self
    {
        $this->uniqueid = $uniqueid;

        return $this;
    }

    public function getCallback(): ?int
    {
        return $this->callback;
    }

    public function setCallback(?int $callback): self
    {
        $this->callback = $callback;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getQueue(): ?Extensions
    {
        return $this->queueid;
    }

    public function setQueue(?Extensions $queueid): self
    {
        $this->queueid = $queueid;

        return $this;
    }
}
