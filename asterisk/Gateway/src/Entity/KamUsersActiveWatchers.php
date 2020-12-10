<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersActiveWatchers
 *
 * @ORM\Table(name="kam_users_active_watchers", uniqueConstraints={@ORM\UniqueConstraint(name="callid", columns={"callid", "to_tag", "from_tag"})}, indexes={@ORM\Index(name="expires", columns={"expires"}), @ORM\Index(name="presentity_uri", columns={"presentity_uri", "event"}), @ORM\Index(name="updated", columns={"updated"}), @ORM\Index(name="updated_winfo", columns={"updated_winfo", "presentity_uri"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersActiveWatchersRepository")
 */
class KamUsersActiveWatchers
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
     * @ORM\Column(name="presentity_uri", type="string", length=128, nullable=false)
     */
    private $presentityUri;

    /**
     * @var string
     *
     * @ORM\Column(name="watcher_username", type="string", length=64, nullable=false)
     */
    private $watcherUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="watcher_domain", type="string", length=64, nullable=false)
     */
    private $watcherDomain;

    /**
     * @var string
     *
     * @ORM\Column(name="to_user", type="string", length=64, nullable=false)
     */
    private $toUser;

    /**
     * @var string
     *
     * @ORM\Column(name="to_domain", type="string", length=64, nullable=false)
     */
    private $toDomain;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=64, nullable=false, options={"default"="presence"})
     */
    private $event = 'presence';

    /**
     * @var string|null
     *
     * @ORM\Column(name="event_id", type="string", length=64, nullable=true)
     */
    private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="to_tag", type="string", length=64, nullable=false)
     */
    private $toTag;

    /**
     * @var string
     *
     * @ORM\Column(name="from_tag", type="string", length=64, nullable=false)
     */
    private $fromTag;

    /**
     * @var string
     *
     * @ORM\Column(name="callid", type="string", length=255, nullable=false)
     */
    private $callid;

    /**
     * @var int
     *
     * @ORM\Column(name="local_cseq", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $localCseq;

    /**
     * @var int
     *
     * @ORM\Column(name="remote_cseq", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $remoteCseq;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=128, nullable=false)
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="record_route", type="text", length=65535, nullable=true)
     */
    private $recordRoute;

    /**
     * @var int
     *
     * @ORM\Column(name="expires", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $expires;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"default"="2","unsigned"=true})
     */
    private $status = '2';

    /**
     * @var string|null
     *
     * @ORM\Column(name="reason", type="string", length=64, nullable=true)
     */
    private $reason;

    /**
     * @var int
     *
     * @ORM\Column(name="version", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="socket_info", type="string", length=64, nullable=false)
     */
    private $socketInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="local_contact", type="string", length=128, nullable=false)
     */
    private $localContact;

    /**
     * @var string
     *
     * @ORM\Column(name="from_user", type="string", length=64, nullable=false)
     */
    private $fromUser;

    /**
     * @var string
     *
     * @ORM\Column(name="from_domain", type="string", length=190, nullable=false)
     */
    private $fromDomain;

    /**
     * @var int
     *
     * @ORM\Column(name="updated", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $updated;

    /**
     * @var int
     *
     * @ORM\Column(name="updated_winfo", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $updatedWinfo;

    /**
     * @var int
     *
     * @ORM\Column(name="flags", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $flags;

    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=255, nullable=false)
     */
    private $userAgent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresentityUri(): ?string
    {
        return $this->presentityUri;
    }

    public function setPresentityUri(string $presentityUri): self
    {
        $this->presentityUri = $presentityUri;

        return $this;
    }

    public function getWatcherUsername(): ?string
    {
        return $this->watcherUsername;
    }

    public function setWatcherUsername(string $watcherUsername): self
    {
        $this->watcherUsername = $watcherUsername;

        return $this;
    }

    public function getWatcherDomain(): ?string
    {
        return $this->watcherDomain;
    }

    public function setWatcherDomain(string $watcherDomain): self
    {
        $this->watcherDomain = $watcherDomain;

        return $this;
    }

    public function getToUser(): ?string
    {
        return $this->toUser;
    }

    public function setToUser(string $toUser): self
    {
        $this->toUser = $toUser;

        return $this;
    }

    public function getToDomain(): ?string
    {
        return $this->toDomain;
    }

    public function setToDomain(string $toDomain): self
    {
        $this->toDomain = $toDomain;

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

    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    public function setEventId(?string $eventId): self
    {
        $this->eventId = $eventId;

        return $this;
    }

    public function getToTag(): ?string
    {
        return $this->toTag;
    }

    public function setToTag(string $toTag): self
    {
        $this->toTag = $toTag;

        return $this;
    }

    public function getFromTag(): ?string
    {
        return $this->fromTag;
    }

    public function setFromTag(string $fromTag): self
    {
        $this->fromTag = $fromTag;

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

    public function getLocalCseq(): ?int
    {
        return $this->localCseq;
    }

    public function setLocalCseq(int $localCseq): self
    {
        $this->localCseq = $localCseq;

        return $this;
    }

    public function getRemoteCseq(): ?int
    {
        return $this->remoteCseq;
    }

    public function setRemoteCseq(int $remoteCseq): self
    {
        $this->remoteCseq = $remoteCseq;

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

    public function getRecordRoute(): ?string
    {
        return $this->recordRoute;
    }

    public function setRecordRoute(?string $recordRoute): self
    {
        $this->recordRoute = $recordRoute;

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

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getSocketInfo(): ?string
    {
        return $this->socketInfo;
    }

    public function setSocketInfo(string $socketInfo): self
    {
        $this->socketInfo = $socketInfo;

        return $this;
    }

    public function getLocalContact(): ?string
    {
        return $this->localContact;
    }

    public function setLocalContact(string $localContact): self
    {
        $this->localContact = $localContact;

        return $this;
    }

    public function getFromUser(): ?string
    {
        return $this->fromUser;
    }

    public function setFromUser(string $fromUser): self
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    public function getFromDomain(): ?string
    {
        return $this->fromDomain;
    }

    public function setFromDomain(string $fromDomain): self
    {
        $this->fromDomain = $fromDomain;

        return $this;
    }

    public function getUpdated(): ?int
    {
        return $this->updated;
    }

    public function setUpdated(int $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getUpdatedWinfo(): ?int
    {
        return $this->updatedWinfo;
    }

    public function setUpdatedWinfo(int $updatedWinfo): self
    {
        $this->updatedWinfo = $updatedWinfo;

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

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }


}
