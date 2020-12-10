<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamVersion
 *
 * @ORM\Table(name="kam_version", uniqueConstraints={@ORM\UniqueConstraint(name="table_name_idx", columns={"table_name"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamVersionRepository")
 */
class KamVersion
{
    /**
     * @var string
     *
     * @ORM\Column(name="table_name", type="string", length=32, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tableName;

    /**
     * @var int
     *
     * @ORM\Column(name="table_version", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $tableVersion;

    public function getTableName(): ?string
    {
        return $this->tableName;
    }

    public function getTableVersion(): ?int
    {
        return $this->tableVersion;
    }

    public function setTableVersion(int $tableVersion): self
    {
        $this->tableVersion = $tableVersion;

        return $this;
    }


}
