<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersLocation
 *
 * @ORM\Table(name="kam_users_location", uniqueConstraints={@ORM\UniqueConstraint(name="ruid_idx", columns={"ruid"})}, indexes={@ORM\Index(name="usersLocation_account_contact_idx", columns={"username", "domain", "contact"}), @ORM\Index(name="usersLocation_expires_idx", columns={"expires"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersLocationRepository")
 */
class KamUsersLocation
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
    private $ruid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    private $username = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="domain", type="string", length=190, nullable=true)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=512, nullable=false)
     */
    private $contact = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="received", type="string", length=128, nullable=true)
     */
    private $received;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path", type="string", length=512, nullable=true)
     */
    private $path;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires", type="datetime", nullable=false, options={"default"="2030-05-28 21:32:15"})
     */
    private $expires = '2030-05-28 21:32:15';

    /**
     * @var float
     *
     * @ORM\Column(name="q", type="float", precision=10, scale=2, nullable=false, options={"default"="1.00"})
     */
    private $q = '1.00';

    /**
     * @var string
     *
     * @ORM\Column(name="callid", type="string", length=255, nullable=false, options={"default"="Default-Call-ID"})
     */
    private $callid = 'Default-Call-ID';

    /**
     * @var int
     *
     * @ORM\Column(name="cseq", type="integer", nullable=false, options={"default"="1"})
     */
    private $cseq = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=false, options={"default"="1900-01-01 00:00:01"})
     */
    private $lastModified = '1900-01-01 00:00:01';

    /**
     * @var int
     *
     * @ORM\Column(name="flags", type="integer", nullable=false)
     */
    private $flags = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="cflags", type="integer", nullable=false)
     */
    private $cflags = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=255, nullable=false)
     */
    private $userAgent = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="socket", type="string", length=64, nullable=true)
     */
    private $socket;

    /**
     * @var int|null
     *
     * @ORM\Column(name="methods", type="integer", nullable=true)
     */
    private $methods;

    /**
     * @var string|null
     *
     * @ORM\Column(name="instance", type="string", length=255, nullable=true)
     */
    private $instance;

    /**
     * @var int
     *
     * @ORM\Column(name="reg_id", type="integer", nullable=false)
     */
    private $regId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="server_id", type="integer", nullable=false)
     */
    private $serverId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="connection_id", type="integer", nullable=false)
     */
    private $connectionId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="keepalive", type="integer", nullable=false)
     */
    private $keepalive = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="partition", type="integer", nullable=false)
     */
    private $partition = '0';

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

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getReceived(): ?string
    {
        return $this->received;
    }

    public function setReceived(?string $received): self
    {
        $this->received = $received;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getExpires(): ?\DateTimeInterface
    {
        return $this->expires;
    }

    public function setExpires(\DateTimeInterface $expires): self
    {
        $this->expires = $expires;

        return $this;
    }

    public function getQ(): ?float
    {
        return $this->q;
    }

    public function setQ(float $q): self
    {
        $this->q = $q;

        return $this;
    }

    public function getCallid(): ?string
    {
        return $this->callid;
    }

    public function setCallid(string $callid): self
    {
        $this->callid = $callid;

        return $this;
    }

    public function getCseq(): ?int
    {
        return $this->cseq;
    }

    public function setCseq(int $cseq): self
    {
        $this->cseq = $cseq;

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

    public function getFlags(): ?int
    {
        return $this->flags;
    }

    public function setFlags(int $flags): self
    {
        $this->flags = $flags;

        return $this;
    }

    public function getCflags(): ?int
    {
        return $this->cflags;
    }

    public function setCflags(int $cflags): self
    {
        $this->cflags = $cflags;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getSocket(): ?string
    {
        return $this->socket;
    }

    public function setSocket(?string $socket): self
    {
        $this->socket = $socket;

        return $this;
    }

    public function getMethods(): ?int
    {
        return $this->methods;
    }

    public function setMethods(?int $methods): self
    {
        $this->methods = $methods;

        return $this;
    }

    public function getInstance(): ?string
    {
        return $this->instance;
    }

    public function setInstance(?string $instance): self
    {
        $this->instance = $instance;

        return $this;
    }

    public function getRegId(): ?int
    {
        return $this->regId;
    }

    public function setRegId(int $regId): self
    {
        $this->regId = $regId;

        return $this;
    }

    public function getServerId(): ?int
    {
        return $this->serverId;
    }

    public function setServerId(int $serverId): self
    {
        $this->serverId = $serverId;

        return $this;
    }

    public function getConnectionId(): ?int
    {
        return $this->connectionId;
    }

    public function setConnectionId(int $connectionId): self
    {
        $this->connectionId = $connectionId;

        return $this;
    }

    public function getKeepalive(): ?int
    {
        return $this->keepalive;
    }

    public function setKeepalive(int $keepalive): self
    {
        $this->keepalive = $keepalive;

        return $this;
    }

    public function getPartition(): ?int
    {
        return $this->partition;
    }

    public function setPartition(int $partition): self
    {
        $this->partition = $partition;

        return $this;
    }


}
