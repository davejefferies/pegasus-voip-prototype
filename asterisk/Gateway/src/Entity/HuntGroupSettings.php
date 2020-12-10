<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HuntGroupSettings
 *
 * @ORM\Table(name="HuntGroupSettings")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\HuntGroupSettingsRepository")
 */
class HuntGroupSettings
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }


}
