<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoutingPatternGroupsRelPatterns
 *
 * @ORM\Table(name="RoutingPatternGroupsRelPatterns", uniqueConstraints={@ORM\UniqueConstraint(name="rel", columns={"routingPatternId", "routingPatternGroupId"})}, indexes={@ORM\Index(name="IDX_C90A69B46D661974", columns={"routingPatternId"}), @ORM\Index(name="IDX_C90A69B486CE18CB", columns={"routingPatternGroupId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\RoutingPatternGroupsRelPatternsRepository")
 */
class RoutingPatternGroupsRelPatterns
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
     * @var \RoutingPatterns
     *
     * @ORM\ManyToOne(targetEntity="RoutingPatterns")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="routingPatternId", referencedColumnName="id")
     * })
     */
    private $routingpattern;

    /**
     * @var \RoutingPatternGroups
     *
     * @ORM\ManyToOne(targetEntity="RoutingPatternGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="routingPatternGroupId", referencedColumnName="id")
     * })
     */
    private $routingpatterngroup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoutingPattern(): ?RoutingPatterns
    {
        return $this->routingpattern;
    }

    public function setRoutingPattern(?RoutingPatterns $routingpatternid): self
    {
        $this->routingpattern = $routingpatternid;

        return $this;
    }

    public function getRoutingPatternGroup(): ?RoutingPatternGroups
    {
        return $this->routingpatterngroup;
    }

    public function setRoutingPatternGroup(?RoutingPatternGroups $routingpatterngroupid): self
    {
        $this->routingpatterngroup = $routingpatterngroupid;

        return $this;
    }


}
