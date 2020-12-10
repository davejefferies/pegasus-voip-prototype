<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersWatchers
 *
 * @ORM\Table(name="kam_users_watchers", uniqueConstraints={@ORM\UniqueConstraint(name="presentity_uri", columns={"presentity_uri", "watcher_username", "watcher_domain", "event"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersWatchersRepository")
 */
class KamUsersWatchers
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
     * @ORM\Column(name="watcher_domain", type="string", length=190, nullable=false)
     */
    private $watcherDomain;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=64, nullable=false, options={"default"="presence"})
     */
    private $event = 'presence';

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reason", type="string", length=64, nullable=true)
     */
    private $reason;

    /**
     * @var int
     *
     * @ORM\Column(name="inserted_time", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $insertedTime;

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

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function setEvent(string $event): self
    {
        $this->event = $event;

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

    public function getInsertedTime(): ?int
    {
        return $this->insertedTime;
    }

    public function setInsertedTime(int $insertedTime): self
    {
        $this->insertedTime = $insertedTime;

        return $this;
    }


}
