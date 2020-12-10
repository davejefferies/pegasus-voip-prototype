<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersPresentity
 *
 * @ORM\Table(name="kam_users_presentity", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"username", "domain", "event", "etag"})}, indexes={@ORM\Index(name="expires", columns={"expires"}), @ORM\Index(name="username_2", columns={"username", "domain", "event"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersPresentityRepository")
 */
class KamUsersPresentity
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
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=190, nullable=false)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=64, nullable=false)
     */
    private $event;

    /**
     * @var string
     *
     * @ORM\Column(name="etag", type="string", length=64, nullable=false)
     */
    private $etag;

    /**
     * @var int
     *
     * @ORM\Column(name="expires", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $expires;

    /**
     * @var int
     *
     * @ORM\Column(name="received_time", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $receivedTime;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="blob", length=65535, nullable=false)
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="sender", type="string", length=128, nullable=false)
     */
    private $sender;

    /**
     * @var int
     *
     * @ORM\Column(name="priority", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="ruid", type="string", length=64, nullable=false)
     */
    private $ruid;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function setEvent(string $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getEtag(): ?string
    {
        return $this->etag;
    }

    public function setEtag(string $etag): self
    {
        $this->etag = $etag;

        return $this;
    }

    public function getExpires(): ?int
    {
        return $this->expires;
    }

    public function setExpires(int $expires): self
    {
        $this->expires = $expires;

        return $this;
    }

    public function getReceivedTime(): ?int
    {
        return $this->receivedTime;
    }

    public function setReceivedTime(int $receivedTime): self
    {
        $this->receivedTime = $receivedTime;

        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

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

    public function getRuid(): ?string
    {
        return $this->ruid;
    }

    public function setRuid(string $ruid): self
    {
        $this->ruid = $ruid;

        return $this;
    }


}
