<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Companies
 *
 * @ORM\Table(name="Companies", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})}, indexes={@ORM\Index(name="applicationServerId", columns={"applicationServerId"}), @ORM\Index(name="countryId", columns={"countryId"}), @ORM\Index(name="currencyId", columns={"currencyId"}), @ORM\Index(name="defaultTimezoneId", columns={"timezoneId"}), @ORM\Index(name="domainId", columns={"domainId"}), @ORM\Index(name="IDX_B52899EF8EB366", columns={"resellerId"}), @ORM\Index(name="languageId", columns={"languageId"}), @ORM\Index(name="mediaRelaySetsId", columns={"mediaRelaySetsId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\CompaniesRepository")
 */
class Companies
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
     * @ORM\Column(name="name", type="string", length=80, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=25, nullable=false)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="distributeMethod", type="string", length=0, nullable=false, options={"default"="hash"})
     */
    private $distributemethod = 'hash';

    /**
     * @var int
     *
     * @ORM\Column(name="maxCalls", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $maxcalls;

    /**
     * @var string
     *
     * @ORM\Column(name="postalAddress", type="string", length=255, nullable=false)
     */
    private $postaladdress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postalCode", type="string", length=10, nullable=true)
     */
    private $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ipFilter", type="integer", nullable=true, options={"default"="1","unsigned"=true})
     */
    private $ipfilter = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="onDemandRecord", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $ondemandrecord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="onDemandRecordCode", type="string", length=3, nullable=true)
     */
    private $ondemandrecordcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="externallyExtraOpts", type="text", length=65535, nullable=true)
     */
    private $externallyextraopts;

    /**
     * @var int|null
     *
     * @ORM\Column(name="recordingsLimitMB", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $recordingslimitmb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recordingsLimitEmail", type="string", length=250, nullable=true)
     */
    private $recordingslimitemail;

    /**
     * @var string
     *
     * @ORM\Column(name="billingMethod", type="string", length=0, nullable=false, options={"default"="postpaid"})
     */
    private $billingmethod = 'postpaid';

    /**
     * @var string|null
     *
     * @ORM\Column(name="balance", type="decimal", precision=10, scale=4, nullable=true, options={"default"="0.0000"})
     */
    private $balance = '0.0000';

    /**
     * @var int|null
     *
     * @ORM\Column(name="showInvoices", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $showinvoices;

    /**
     * @var int
     *
     * @ORM\Column(name="maxDailyUsage", type="integer", nullable=false, options={"default"="1000000","unsigned"=true})
     */
    private $maxdailyusage = '1000000';

    /**
     * @var int
     *
     * @ORM\Column(name="allowRecordingRemoval", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $allowrecordingremoval = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="delimiter", type="string", length=1, nullable=false, options={"default"="*"})
     */
    private $delimiter = '*';

    /**
     * @var \Domains
     *
     * @ORM\ManyToOne(targetEntity="Domains")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domainId", referencedColumnName="id")
     * })
     */
    private $domainid;

    /**
     * @var \Currencies
     *
     * @ORM\ManyToOne(targetEntity="Currencies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currencyId", referencedColumnName="id")
     * })
     */
    private $currencyid;

    /**
     * @var \Languages
     *
     * @ORM\ManyToOne(targetEntity="Languages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="languageId", referencedColumnName="id")
     * })
     */
    private $languageid;

    /**
     * @var \Timezones
     *
     * @ORM\ManyToOne(targetEntity="Timezones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="timezoneId", referencedColumnName="id")
     * })
     */
    private $timezoneid;

    /**
     * @var \MediaRelaySets
     *
     * @ORM\ManyToOne(targetEntity="MediaRelaySets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mediaRelaySetsId", referencedColumnName="id")
     * })
     */
    private $mediarelaysetsid;

    /**
     * @var \ApplicationServers
     *
     * @ORM\ManyToOne(targetEntity="ApplicationServers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="applicationServerId", referencedColumnName="id")
     * })
     */
    private $applicationserverid;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="id")
     * })
     */
    private $countryid;

    /**
     * @var \Resellers
     *
     * @ORM\ManyToOne(targetEntity="Resellers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resellerId", referencedColumnName="id")
     * })
     */
    private $resellerid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): self
    {
        $this->nif = $nif;

        return $this;
    }

    public function getDistributeMethod(): ?string
    {
        return $this->distributemethod;
    }

    public function setDistributeMethod(string $distributemethod): self
    {
        $this->distributemethod = $distributemethod;

        return $this;
    }

    public function getMaxCalls(): ?int
    {
        return $this->maxcalls;
    }

    public function setMaxCalls(int $maxcalls): self
    {
        $this->maxcalls = $maxcalls;

        return $this;
    }

    public function getPostalAddress(): ?string
    {
        return $this->postaladdress;
    }

    public function setPostalAddress(string $postaladdress): self
    {
        $this->postaladdress = $postaladdress;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalCode(?string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getIpFilter(): ?int
    {
        return $this->ipfilter;
    }

    public function setIpFilter(?int $ipfilter): self
    {
        $this->ipfilter = $ipfilter;

        return $this;
    }

    public function getOndemandRecord(): ?int
    {
        return $this->ondemandrecord;
    }

    public function setOndemandRecord(?int $ondemandrecord): self
    {
        $this->ondemandrecord = $ondemandrecord;

        return $this;
    }

    public function getOndemandRecordCode(): ?string
    {
        return $this->ondemandrecordcode;
    }

    public function setOndemandRecordCode(?string $ondemandrecordcode): self
    {
        $this->ondemandrecordcode = $ondemandrecordcode;

        return $this;
    }

    public function getExternallyExtraOpts(): ?string
    {
        return $this->externallyextraopts;
    }

    public function setExternallyExtraOpts(?string $externallyextraopts): self
    {
        $this->externallyextraopts = $externallyextraopts;

        return $this;
    }

    public function getRecordingsLimitMb(): ?int
    {
        return $this->recordingslimitmb;
    }

    public function setRecordingsLimitMb(?int $recordingslimitmb): self
    {
        $this->recordingslimitmb = $recordingslimitmb;

        return $this;
    }

    public function getRecordingsLimitEmail(): ?string
    {
        return $this->recordingslimitemail;
    }

    public function setRecordingsLimitEmail(?string $recordingslimitemail): self
    {
        $this->recordingslimitemail = $recordingslimitemail;

        return $this;
    }

    public function getBillingMethod(): ?string
    {
        return $this->billingmethod;
    }

    public function setBillingMethod(string $billingmethod): self
    {
        $this->billingmethod = $billingmethod;

        return $this;
    }

    public function getBalance(): ?string
    {
        return $this->balance;
    }

    public function setBalance(?string $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getShowInvoices(): ?int
    {
        return $this->showinvoices;
    }

    public function setShowInvoices(?int $showinvoices): self
    {
        $this->showinvoices = $showinvoices;

        return $this;
    }

    public function getMaxDailyUsage(): ?int
    {
        return $this->maxdailyusage;
    }

    public function setMaxDailyUsage(int $maxdailyusage): self
    {
        $this->maxdailyusage = $maxdailyusage;

        return $this;
    }

    public function getAllowRecordingRemoval(): ?int
    {
        return $this->allowrecordingremoval;
    }

    public function setAllowRecordingRemoval(int $allowrecordingremoval): self
    {
        $this->allowrecordingremoval = $allowrecordingremoval;

        return $this;
    }

    public function getDelimiter(): ?string
    {
        return $this->delimiter;
    }

    public function setDelimiter(string $delimiter): self
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    public function getDomain(): ?Domains
    {
        return $this->domainid;
    }

    public function setDomain(?Domains $domainid): self
    {
        $this->domainid = $domainid;

        return $this;
    }

    public function getCurrency(): ?Currencies
    {
        return $this->currencyid;
    }

    public function setCurrency(?Currencies $currencyid): self
    {
        $this->currencyid = $currencyid;

        return $this;
    }

    public function getLanguage(): ?Languages
    {
        return $this->languageid;
    }

    public function setLanguage(?Languages $languageid): self
    {
        $this->languageid = $languageid;

        return $this;
    }

    public function getTimezone(): ?Timezones
    {
        return $this->timezoneid;
    }

    public function setTimezone(?Timezones $timezoneid): self
    {
        $this->timezoneid = $timezoneid;

        return $this;
    }

    public function getMediaRelaySets(): ?MediaRelaySets
    {
        return $this->mediarelaysetsid;
    }

    public function setMediaRelaySets(?MediaRelaySets $mediarelaysetsid): self
    {
        $this->mediarelaysetsid = $mediarelaysetsid;

        return $this;
    }

    public function getApplicationServer(): ?ApplicationServers
    {
        return $this->applicationserverid;
    }

    public function setApplicationServer(?ApplicationServers $applicationserverid): self
    {
        $this->applicationserverid = $applicationserverid;

        return $this;
    }

    public function getCountry(): ?Countries
    {
        return $this->countryid;
    }

    public function setCountry(?Countries $countryid): self
    {
        $this->countryid = $countryid;

        return $this;
    }

    public function getReseller(): ?Resellers
    {
        return $this->resellerid;
    }

    public function setReseller(?Resellers $resellerid): self
    {
        $this->resellerid = $resellerid;

        return $this;
    }


}
