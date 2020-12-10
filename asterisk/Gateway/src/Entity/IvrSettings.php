<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IvrSettings
 *
 * @ORM\Table(name="IvrSettings")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\IvrSettingsRepository")
 */
class IvrSettings
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
