<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QueueMembers
 *
 * @ORM\Table(name="QueueMembers", uniqueConstraints={@ORM\UniqueConstraint(name="queueId", columns={"queueId", "extensionId"})}, indexes={@ORM\Index(name="extensionId", columns={"extensionId"}), @ORM\Index(name="queueId_2", columns={"queueId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\QueueMembersRepository")
 */
class QueueMembers
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
     * @var int|null
     *
     * @ORM\Column(name="penalty", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $penalty;

    /**
     * @var int
     *
     * @ORM\Column(name="supervisor", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $supervisor;

    /**
     * @var \Extensions
     *
     * @ORM\ManyToOne(targetEntity="Extensions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="extensionId", referencedColumnName="id")
     * })
     */
    private $extension;

    /**
     * @var \Extensions
     *
     * @ORM\ManyToOne(targetEntity="Extensions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="queueId", referencedColumnName="id")
     * })
     */
    private $queue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPenalty(): ?int
    {
        return $this->penalty;
    }

    public function setPenalty(?int $penalty): self
    {
        $this->penalty = $penalty;

        return $this;
    }

    public function getSupervisor(): ?int
    {
        return $this->supervisor;
    }

    public function setSupervisor(int $supervisor): self
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    public function getExtension(): ?Extensions
    {
        return $this->extension;
    }

    public function setExtension(?Extensions $extensionid): self
    {
        $this->extension = $extensionid;

        return $this;
    }

    public function getQueue(): ?Extensions
    {
        return $this->queue;
    }

    public function setQueue(?Extensions $queueid): self
    {
        $this->queue = $queueid;

        return $this;
    }


}
