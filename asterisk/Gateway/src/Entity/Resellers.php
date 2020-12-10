<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resellers
 *
 * @ORM\Table(name="Resellers", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})}, indexes={@ORM\Index(name="countryId", columns={"countryId"}), @ORM\Index(name="IDX_1034671091000B8A", columns={"currencyId"}), @ORM\Index(name="languageId", columns={"languageId"}), @ORM\Index(name="timezoneId", columns={"timezoneId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\ResellersRepository")
 */
class Resellers
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
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="id")
     * })
     */
    private $countryid;

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

    public function getCountry(): ?Countries
    {
        return $this->countryid;
    }

    public function setCountry(?Countries $countryid): self
    {
        $this->countryid = $countryid;

        return $this;
    }


}
