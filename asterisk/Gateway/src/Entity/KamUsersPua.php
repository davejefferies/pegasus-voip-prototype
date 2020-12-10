<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersPua
 *
 * @ORM\Table(name="kam_users_pua", uniqueConstraints={@ORM\UniqueConstraint(name="etag", columns={"etag", "tuple_id", "call_id", "from_tag"})}, indexes={@ORM\Index(name="call_id", columns={"call_id", "from_tag"}), @ORM\Index(name="expires", columns={"expires"}), @ORM\Index(name="pres_id", columns={"pres_id", "pres_uri"}), @ORM\Index(name="pres_id_2", columns={"pres_id"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersPuaRepository")
 */
class KamUsersPua
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
     * @ORM\Column(name="pres_uri", type="string", length=128, nullable=false)
     */
    private $presUri;

    /**
     * @var string
     *
     * @ORM\Column(name="pres_id", type="string", length=255, nullable=false)
     */
    private $presId;

    /**
     * @var int
     *
     * @ORM\Column(name="event", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $event;

    /**
     * @var int
     *
     * @ORM\Column(name="expires", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $expires;

    /**
     * @var int
     *
     * @ORM\Column(name="desired_expires", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $desiredExpires;

    /**
     * @var int
     *
     * @ORM\Column(name="flag", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $flag;

    /**
     * @var string
     *
     * @ORM\Column(name="etag", type="string", length=64, nullable=false)
     */
    private $etag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tuple_id", type="string", length=64, nullable=true)
     */
    private $tupleId;

    /**
     * @var string
     *
     * @ORM\Column(name="watcher_uri", type="string", length=128, nullable=false)
     */
    private $watcherUri;

    /**
     * @var string
     *
     * @ORM\Column(name="call_id", type="string", length=255, nullable=false)
     */
    private $callId;

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
     * @var int
     *
     * @ORM\Column(name="cseq", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $cseq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="record_route", type="text", length=65535, nullable=true)
     */
    private $recordRoute;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=128, nullable=false)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="remote_contact", type="string", length=128, nullable=false)
     */
    private $remoteContact;

    /**
     * @var int
     *
     * @ORM\Column(name="version", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="extra_headers", type="text", length=65535, nullable=false)
     */
    private $extraHeaders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresUri(): ?string
    {
        return $this->presUri;
    }

    public function setPresUri(string $presUri): self
    {
        $this->presUri = $presUri;

        return $this;
    }

    public function getPresId(): ?string
    {
        return $this->presId;
    }

    public function setPresId(string $presId): self
    {
        $this->presId = $presId;

        return $this;
    }

    public function getEvent(): ?int
    {
        return $this->event;
    }

    public function setEvent(int $event): self
    {
        $this->event = $event;

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

    public function getDesiredExpires(): ?int
    {
        return $this->desiredExpires;
    }

    public function setDesiredExpires(int $desiredExpires): self
    {
        $this->desiredExpires = $desiredExpires;

        return $this;
    }

    public function getFlag(): ?int
    {
        return $this->flag;
    }

    public function setFlag(int $flag): self
    {
        $this->flag = $flag;

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

    public function getTupleId(): ?string
    {
        return $this->tupleId;
    }

    public function setTupleId(?string $tupleId): self
    {
        $this->tupleId = $tupleId;

        return $this;
    }

    public function getWatcherUri(): ?string
    {
        return $this->watcherUri;
    }

    public function setWatcherUri(string $watcherUri): self
    {
        $this->watcherUri = $watcherUri;

        return $this;
    }

    public function getCallId(): ?string
    {
        return $this->callId;
    }

    public function setCallId(string $callId): self
    {
        $this->callId = $callId;

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

    public function getCseq(): ?int
    {
        return $this->cseq;
    }

    public function setCseq(int $cseq): self
    {
        $this->cseq = $cseq;

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

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getRemoteContact(): ?string
    {
        return $this->remoteContact;
    }

    public function setRemoteContact(string $remoteContact): self
    {
        $this->remoteContact = $remoteContact;

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

    public function getExtraHeaders(): ?string
    {
        return $this->extraHeaders;
    }

    public function setExtraHeaders(string $extraHeaders): self
    {
        $this->extraHeaders = $extraHeaders;

        return $this;
    }


}
