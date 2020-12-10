<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandLog
 *
 * @ORM\Table(name="Commandlog", indexes={@ORM\Index(name="createdOn", columns={"createdOn"}), @ORM\Index(name="requestId", columns={"requestId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\CommandLogRepository")
 */
class CommandLog
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=36, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="requestId", type="string", length=36, nullable=false, options={"fixed"=true})
     */
    private $requestid;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=50, nullable=false)
     */
    private $class;

    /**
     * @var string|null
     *
     * @ORM\Column(name="method", type="string", length=64, nullable=true)
     */
    private $method;

    /**
     * @var string|null
     *
     * @ORM\Column(name="arguments", type="text", length=0, nullable=true)
     */
    private $arguments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=false)
     */
    private $createdon;

    /**
     * @var int
     *
     * @ORM\Column(name="microtime", type="integer", nullable=false)
     */
    private $microtime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="agent", type="text", length=0, nullable=true)
     */
    private $agent;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getRequestId(): ?string
    {
        return $this->requestid;
    }

    public function setRequestId(string $requestid): self
    {
        $this->requestid = $requestid;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(?string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getArguments(): ?string
    {
        return $this->arguments;
    }

    public function setArguments(?string $arguments): self
    {
        $this->arguments = $arguments;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdon;
    }

    public function setCreatedOn(\DateTimeInterface $createdon): self
    {
        $this->createdon = $createdon;

        return $this;
    }

    public function getMicroTime(): ?int
    {
        return $this->microtime;
    }

    public function setMicroTime(int $microtime): self
    {
        $this->microtime = $microtime;

        return $this;
    }

    public function getAgent(): ?string
    {
        return $this->agent;
    }

    public function setAgent(?string $agent): self
    {
        $this->agent = $agent;

        return $this;
    }


}
