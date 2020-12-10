<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyServices
 *
 * @ORM\Table(name="CompanyServices", uniqueConstraints={@ORM\UniqueConstraint(name="companyService_company_service", columns={"companyId", "serviceId"})}, indexes={@ORM\Index(name="IDX_569B460B2480E723", columns={"companyId"}), @ORM\Index(name="IDX_569B460B89697FA8", columns={"serviceId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\CompanyServicesRepository")
 */
class CompanyServices
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
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var \Companies
     *
     * @ORM\ManyToOne(targetEntity="Companies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="companyId", referencedColumnName="id")
     * })
     */
    private $company;

    /**
     * @var \Services
     *
     * @ORM\ManyToOne(targetEntity="Services")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="serviceId", referencedColumnName="id")
     * })
     */
    private $service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCompany(): ?Companies
    {
        return $this->company;
    }

    public function setCompany(?Companies $companyid): self
    {
        $this->company = $companyid;

        return $this;
    }

    public function getService(): ?Services
    {
        return $this->service;
    }

    public function setService(?Services $serviceid): self
    {
        $this->service = $serviceid;

        return $this;
    }


}
