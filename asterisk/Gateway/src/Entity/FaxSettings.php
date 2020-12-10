<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FaxSettings
 *
 * @ORM\Table(name="FaxSettings")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\FaxSettingsRepository")
 */
class FaxSettings
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
