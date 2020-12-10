<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransformationRules
 *
 * @ORM\Table(name="TransformationRules", indexes={@ORM\Index(name="transformationRuleSetId", columns={"transformationRuleSetId"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\TransformationRulesRepository")
 */
class TransformationRules
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
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=64, nullable=false)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="priority", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $priority;

    /**
     * @var string|null
     *
     * @ORM\Column(name="matchExpr", type="string", length=128, nullable=true)
     */
    private $matchexpr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="replaceExpr", type="string", length=128, nullable=true)
     */
    private $replaceexpr;

    /**
     * @var \TransformationRuleSets
     *
     * @ORM\ManyToOne(targetEntity="TransformationRuleSets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="transformationRuleSetId", referencedColumnName="id")
     * })
     */
    private $transformationruleset;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getMatchExpr(): ?string
    {
        return $this->matchexpr;
    }

    public function setMatchExpr(?string $matchexpr): self
    {
        $this->matchexpr = $matchexpr;

        return $this;
    }

    public function getReplaceExpr(): ?string
    {
        return $this->replaceexpr;
    }

    public function setReplaceExpr(?string $replaceexpr): self
    {
        $this->replaceexpr = $replaceexpr;

        return $this;
    }

    public function getTransformationRuleSet(): ?TransformationRuleSets
    {
        return $this->transformationruleset;
    }

    public function setTransformationRuleSet(?TransformationRuleSets $transformationrulesetid): self
    {
        $this->transformationruleset = $transformationrulesetid;

        return $this;
    }


}
