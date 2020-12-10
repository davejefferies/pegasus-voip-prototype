<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Extensions
 *
 * @ORM\Table(name="Extensions", uniqueConstraints={@ORM\UniqueConstraint(name="companyId", columns={"companyId", "number"}), @ORM\UniqueConstraint(name="extendedNumber", columns={"extendedNumber"})}, indexes={@ORM\Index(name="companyId_2", columns={"companyId"}), @ORM\Index(name="conferenceSetting", columns={"conferenceSetting"}), @ORM\Index(name="faxSetting", columns={"faxSetting"}), @ORM\Index(name="huntGroupSetting", columns={"huntGroupSetting"}), @ORM\Index(name="ivrSetting", columns={"ivrSetting"}), @ORM\Index(name="queueSetting", columns={"queueSetting"}), @ORM\Index(name="termSetting", columns={"termSetting"}, columns={"voicemailSetting"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\ExtensionsRepository")
 */
class Extensions
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
     * @ORM\Column(name="type", type="string", length=0, nullable=false, options={"default"="term"})
     */
    private $type = 'term';

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=20, nullable=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="extendedNumber", type="string", length=20, nullable=false)
     */
    private $extendednumber;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=100, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="t38Passthrough", type="string", length=255, nullable=false, options={"default"="no"})
     */
    private $t38passthrough = 'no';

    /**
     * @var \Companies
     *
     * @ORM\ManyToOne(targetEntity="Companies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="companyId", referencedColumnName="id")
     * })
     */
    private $companyid;

    /**
     * @var \TermSettings
     *
     * @ORM\ManyToOne(targetEntity="TermSettings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="termSetting", referencedColumnName="id")
     * })
     */
    private $termsetting;

    /**
     * @var \HuntGroupSettings
     *
     * @ORM\ManyToOne(targetEntity="HuntGroupSettings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="huntGroupSetting", referencedColumnName="id")
     * })
     */
    private $huntgroupsetting;

    /**
     * @var \FaxSettings
     *
     * @ORM\ManyToOne(targetEntity="FaxSettings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="faxSetting", referencedColumnName="id")
     * })
     */
    private $faxsetting;

    /**
     * @var \ConferenceSettings
     *
     * @ORM\ManyToOne(targetEntity="ConferenceSettings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conferenceSetting", referencedColumnName="id")
     * })
     */
    private $conferencesetting;

    /**
     * @var \QueueSettings
     *
     * @ORM\ManyToOne(targetEntity="QueueSettings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="queueSetting", referencedColumnName="id")
     * })
     */
    private $queuesetting;

    /**
     * @var \IvrSettings
     *
     * @ORM\ManyToOne(targetEntity="IvrSettings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ivrSetting", referencedColumnName="id")
     * })
     */
    private $ivrsetting;

    /**
     * @var \VoicemailSettings
     *
     * @ORM\ManyToOne(targetEntity="VoicemailSettings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="voicemailSetting", referencedColumnName="id")
     * })
     */
    private $voicemailsetting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getExtendedNumber(): ?string
    {
        return $this->extendednumber;
    }

    public function setExtendedNumber(string $extendednumber): self
    {
        $this->extendednumber = $extendednumber;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getT38passthrough(): ?string
    {
        return $this->t38passthrough;
    }

    public function setT38passthrough(string $t38passthrough): self
    {
        $this->t38passthrough = $t38passthrough;

        return $this;
    }

    public function getCompany(): ?Companies
    {
        return $this->companyid;
    }

    public function setCompany(?Companies $companyid): self
    {
        $this->companyid = $companyid;

        return $this;
    }

    public function getTermSetting(): ?TermSettings
    {
        return $this->termsetting;
    }

    public function setTermSetting(?TermSettings $termsetting): self
    {
        $this->termsetting = $termsetting;

        return $this;
    }

    public function getHuntGroupSetting(): ?HuntGroupSettings
    {
        return $this->huntgroupsetting;
    }

    public function setHuntGroupSetting(?HuntGroupSettings $huntgroupsetting): self
    {
        $this->huntgroupsetting = $huntgroupsetting;

        return $this;
    }

    public function getFaxSetting(): ?FaxSettings
    {
        return $this->faxsetting;
    }

    public function setFaxSetting(?FaxSettings $faxsetting): self
    {
        $this->faxsetting = $faxsetting;

        return $this;
    }

    public function getConferenceSetting(): ?ConferenceSettings
    {
        return $this->conferencesetting;
    }

    public function setConferenceSetting(?ConferenceSettings $conferencesetting): self
    {
        $this->conferencesetting = $conferencesetting;

        return $this;
    }

    public function getQueueSetting(): ?QueueSettings
    {
        return $this->queuesetting;
    }

    public function setQueueSetting(?QueueSettings $queuesetting): self
    {
        $this->queuesetting = $queuesetting;

        return $this;
    }

    public function getIvrSetting(): ?IvrSettings
    {
        return $this->ivrsetting;
    }

    public function setIvrSetting(?IvrSettings $ivrsetting): self
    {
        $this->ivrsetting = $ivrsetting;

        return $this;
    }

    public function getVoicemailSetting(): ?VoicemailSettings
    {
        return $this->voicemailsetting;
    }

    public function setVoicemailSetting(?VoicemailSettings $voicemailsetting): self
    {
        $this->voicemailsetting = $voicemailsetting;

        return $this;
    }
}
