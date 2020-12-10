<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MigrationVersions
 *
 * @ORM\Table(name="migration_versions")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\MigrationVersionsRepository")
 */
class MigrationVersions
{
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=14, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $version;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="executed_at", type="datetime", nullable=false)
     */
    private $executedAt;

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function getExecutedAt(): ?\DateTimeInterface
    {
        return $this->executedAt;
    }

    public function setExecutedAt(\DateTimeInterface $executedAt): self
    {
        $this->executedAt = $executedAt;

        return $this;
    }


}
