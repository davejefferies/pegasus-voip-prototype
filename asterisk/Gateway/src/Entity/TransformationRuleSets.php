<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransformationRuleSets
 *
 * @ORM\Table(name="TransformationRuleSets", indexes={@ORM\Index(name="countryId", columns={"countryId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\TransformationRuleSetsRepository")
 */
class TransformationRuleSets
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="internationalCode", type="string", length=10, nullable=true, options={"default"="00"})
     */
    private $internationalcode = '00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="trunkPrefix", type="string", length=5, nullable=true)
     */
    private $trunkprefix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="areaCode", type="string", length=5, nullable=true)
     */
    private $areacode;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nationalLen", type="integer", nullable=true, options={"default"="9","unsigned"=true})
     */
    private $nationallen = '9';

    /**
     * @var int|null
     *
     * @ORM\Column(name="generateRules", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $generaterules;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="id")
     * })
     */
    private $country;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getInternationalCode(): ?string
    {
        return $this->internationalcode;
    }

    public function setInternationalCode(?string $internationalcode): self
    {
        $this->internationalcode = $internationalcode;

        return $this;
    }

    public function getTrunkPrefix(): ?string
    {
        return $this->trunkprefix;
    }

    public function setTrunkPrefix(?string $trunkprefix): self
    {
        $this->trunkprefix = $trunkprefix;

        return $this;
    }

    public function getAreaCode(): ?string
    {
        return $this->areacode;
    }

    public function setAreaCode(?string $areacode): self
    {
        $this->areacode = $areacode;

        return $this;
    }

    public function getNationalLen(): ?int
    {
        return $this->nationallen;
    }

    public function setNationalLen(?int $nationallen): self
    {
        $this->nationallen = $nationallen;

        return $this;
    }

    public function getGenerateRules(): ?int
    {
        return $this->generaterules;
    }

    public function setGenerateRules(?int $generaterules): self
    {
        $this->generaterules = $generaterules;

        return $this;
    }

    public function getCountry(): ?Countries
    {
        return $this->country;
    }

    public function setCountry(?Countries $countryid): self
    {
        $this->country = $countryid;

        return $this;
    }


}
