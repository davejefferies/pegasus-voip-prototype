<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersHtable
 *
 * @ORM\Table(name="kam_users_htable")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersHtableRepository")
 */
class KamUsersHtable
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
     * @ORM\Column(name="key_name", type="string", length=64, nullable=false)
     */
    private $keyName;

    /**
     * @var int
     *
     * @ORM\Column(name="key_type", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $keyType;

    /**
     * @var int
     *
     * @ORM\Column(name="value_type", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $valueType;

    /**
     * @var string
     *
     * @ORM\Column(name="key_value", type="string", length=128, nullable=false)
     */
    private $keyValue;

    /**
     * @var int
     *
     * @ORM\Column(name="expires", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $expires;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeyName(): ?string
    {
        return $this->keyName;
    }

    public function setKeyName(string $keyName): self
    {
        $this->keyName = $keyName;

        return $this;
    }

    public function getKeyType(): ?int
    {
        return $this->keyType;
    }

    public function setKeyType(int $keyType): self
    {
        $this->keyType = $keyType;

        return $this;
    }

    public function getValueType(): ?int
    {
        return $this->valueType;
    }

    public function setValueType(int $valueType): self
    {
        $this->valueType = $valueType;

        return $this;
    }

    public function getKeyValue(): ?string
    {
        return $this->keyValue;
    }

    public function setKeyValue(string $keyValue): self
    {
        $this->keyValue = $keyValue;

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


}
