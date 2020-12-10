<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoicemailSettings
 *
 * @ORM\Table(name="VoicemailSettings")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\VoicemailSettingsRepository")
 */
class VoicemailSettings
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
     * @var int
     *
     * @ORM\Column(name="enabled", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=80, nullable=false, options={"default"="1234"})
     */
    private $password = '1234';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pager", type="string", length=80, nullable=true)
     */
    private $pager;

    /**
     * @var string|null
     *
     * @ORM\Column(name="attach", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $attach = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="attachfmt", type="string", length=10, nullable=true)
     */
    private $attachfmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="serveremail", type="string", length=80, nullable=true)
     */
    private $serveremail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="deleteast_voicemail", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $deleteastVoicemail = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="saycid", type="string", length=255, nullable=true, options={"default"="yes"})
     */
    private $saycid = 'yes';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sendast_voicemail", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $sendastVoicemail = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="review", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $review = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tempgreetwarn", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $tempgreetwarn = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="operator", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $operator = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="envelope", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $envelope = 'no';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sayduration", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $sayduration;

    /**
     * @var string|null
     *
     * @ORM\Column(name="forcename", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $forcename = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="forcegreetings", type="string", length=0, nullable=true, options={"default"="no"})
     */
    private $forcegreetings = 'no';

    /**
     * @var string|null
     *
     * @ORM\Column(name="callback", type="string", length=80, nullable=true)
     */
    private $callback;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dialout", type="string", length=80, nullable=true)
     */
    private $dialout;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exitcontext", type="string", length=80, nullable=true)
     */
    private $exitcontext;

    /**
     * @var int|null
     *
     * @ORM\Column(name="maxmsg", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $maxmsg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="volgain", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $volgain;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imapuser", type="string", length=80, nullable=true)
     */
    private $imapuser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imappassword", type="string", length=80, nullable=true)
     */
    private $imappassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imapserver", type="string", length=80, nullable=true)
     */
    private $imapserver;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imapport", type="string", length=8, nullable=true)
     */
    private $imapport;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imapflags", type="string", length=80, nullable=true)
     */
    private $imapflags;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="stamp", type="datetime", nullable=true)
     */
    private $stamp;

    public function getId(): ?int
    {
        return $this->uniqueid;
    }

    public function getEnabled(): ?int
    {
        return $this->enabled;
    }

    public function setEnabled(int $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPager(): ?string
    {
        return $this->pager;
    }

    public function setPager(?string $pager): self
    {
        $this->pager = $pager;

        return $this;
    }

    public function getAttach(): ?string
    {
        return $this->attach;
    }

    public function setAttach(?string $attach): self
    {
        $this->attach = $attach;

        return $this;
    }

    public function getAttachfmt(): ?string
    {
        return $this->attachfmt;
    }

    public function setAttachfmt(?string $attachfmt): self
    {
        $this->attachfmt = $attachfmt;

        return $this;
    }

    public function getServeremail(): ?string
    {
        return $this->serveremail;
    }

    public function setServeremail(?string $serveremail): self
    {
        $this->serveremail = $serveremail;

        return $this;
    }

    public function getDeleteastVoicemail(): ?string
    {
        return $this->deleteastVoicemail;
    }

    public function setDeleteastVoicemail(?string $deleteastVoicemail): self
    {
        $this->deleteastVoicemail = $deleteastVoicemail;

        return $this;
    }

    public function getSaycid(): ?string
    {
        return $this->saycid;
    }

    public function setSaycid(?string $saycid): self
    {
        $this->saycid = $saycid;

        return $this;
    }

    public function getSendastVoicemail(): ?string
    {
        return $this->sendastVoicemail;
    }

    public function setSendastVoicemail(?string $sendastVoicemail): self
    {
        $this->sendastVoicemail = $sendastVoicemail;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(?string $review): self
    {
        $this->review = $review;

        return $this;
    }

    public function getTempgreetwarn(): ?string
    {
        return $this->tempgreetwarn;
    }

    public function setTempgreetwarn(?string $tempgreetwarn): self
    {
        $this->tempgreetwarn = $tempgreetwarn;

        return $this;
    }

    public function getOperator(): ?string
    {
        return $this->operator;
    }

    public function setOperator(?string $operator): self
    {
        $this->operator = $operator;

        return $this;
    }

    public function getEnvelope(): ?string
    {
        return $this->envelope;
    }

    public function setEnvelope(?string $envelope): self
    {
        $this->envelope = $envelope;

        return $this;
    }

    public function getSayduration(): ?int
    {
        return $this->sayduration;
    }

    public function setSayduration(?int $sayduration): self
    {
        $this->sayduration = $sayduration;

        return $this;
    }

    public function getForcename(): ?string
    {
        return $this->forcename;
    }

    public function setForcename(?string $forcename): self
    {
        $this->forcename = $forcename;

        return $this;
    }

    public function getForcegreetings(): ?string
    {
        return $this->forcegreetings;
    }

    public function setForcegreetings(?string $forcegreetings): self
    {
        $this->forcegreetings = $forcegreetings;

        return $this;
    }

    public function getCallback(): ?string
    {
        return $this->callback;
    }

    public function setCallback(?string $callback): self
    {
        $this->callback = $callback;

        return $this;
    }

    public function getDialout(): ?string
    {
        return $this->dialout;
    }

    public function setDialout(?string $dialout): self
    {
        $this->dialout = $dialout;

        return $this;
    }

    public function getExitcontext(): ?string
    {
        return $this->exitcontext;
    }

    public function setExitcontext(?string $exitcontext): self
    {
        $this->exitcontext = $exitcontext;

        return $this;
    }

    public function getMaxmsg(): ?int
    {
        return $this->maxmsg;
    }

    public function setMaxmsg(?int $maxmsg): self
    {
        $this->maxmsg = $maxmsg;

        return $this;
    }

    public function getVolgain(): ?string
    {
        return $this->volgain;
    }

    public function setVolgain(?string $volgain): self
    {
        $this->volgain = $volgain;

        return $this;
    }

    public function getImapUser(): ?string
    {
        return $this->imapuser;
    }

    public function setImapUser(?string $imapuser): self
    {
        $this->imapuser = $imapuser;

        return $this;
    }

    public function getImapPassword(): ?string
    {
        return $this->imappassword;
    }

    public function setImapPassword(?string $imappassword): self
    {
        $this->imappassword = $imappassword;

        return $this;
    }

    public function getImapServer(): ?string
    {
        return $this->imapserver;
    }

    public function setImapServer(?string $imapserver): self
    {
        $this->imapserver = $imapserver;

        return $this;
    }

    public function getImapPort(): ?string
    {
        return $this->imapport;
    }

    public function setImapPort(?string $imapport): self
    {
        $this->imapport = $imapport;

        return $this;
    }

    public function getImapFlags(): ?string
    {
        return $this->imapflags;
    }

    public function setImapFlags(?string $imapflags): self
    {
        $this->imapflags = $imapflags;

        return $this;
    }

    public function getStamp(): ?\DateTimeInterface
    {
        return $this->stamp;
    }

    public function setStamp(?\DateTimeInterface $stamp): self
    {
        $this->stamp = $stamp;

        return $this;
    }
}
