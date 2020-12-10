<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TermSettings
 *
 * @ORM\Table(name="TermSettings")
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\TermSettingsRepository")
 */
class TermSettings
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
     * @var int
     *
     * @ORM\Column(name="dnd", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $dnd = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="maxCalls", type="integer", nullable=false)
     */
    private $maxcalls = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="noAnswerTimeout", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $noanswertimeout = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="callerIdExternal", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $calleridexternal = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="callerIdInternal", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $calleridinternal = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="callerIdName", type="string", length=255, nullable=true)
     */
    private $calleridname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="callerIdNum", type="string", length=255, nullable=true)
     */
    private $calleridnum;

    /**
     * @var int
     *
     * @ORM\Column(name="recording", type="integer", nullable=false)
     */
    private $recording = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=25, nullable=false)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDnd(): ?int
    {
        return $this->dnd;
    }

    public function setDnd(int $dnd): self
    {
        $this->dnd = $dnd;

        return $this;
    }

    public function getMaxCalls(): ?int
    {
        return $this->maxcalls;
    }

    public function setMaxCalls(int $maxcalls): self
    {
        $this->maxcalls = $maxcalls;

        return $this;
    }

    public function getNoAnswerTimeout(): ?int
    {
        return $this->noanswertimeout;
    }

    public function setNoAnswerTimeout(int $noanswertimeout): self
    {
        $this->noanswertimeout = $noanswertimeout;

        return $this;
    }

    public function getCallerIdExternal(): ?int
    {
        return $this->calleridexternal;
    }

    public function setCallerIdExternal(int $calleridexternal): self
    {
        $this->calleridexternal = $calleridexternal;

        return $this;
    }

    public function getCallerIdInternal(): ?int
    {
        return $this->calleridinternal;
    }

    public function setCallerIdInternal(int $calleridinternal): self
    {
        $this->calleridinternal = $calleridinternal;

        return $this;
    }

    public function getCallerIdName(): ?string
    {
        return $this->calleridname;
    }

    public function setCallerIdName(?string $calleridname): self
    {
        $this->calleridname = $calleridname;

        return $this;
    }

    public function getCallerIdNum(): ?string
    {
        return $this->calleridnum;
    }

    public function setCallerIdNum(?string $calleridnum): self
    {
        $this->calleridnum = $calleridnum;

        return $this;
    }

    public function getRecording(): ?int
    {
        return $this->recording;
    }

    public function setRecording(int $recording): self
    {
        $this->recording = $recording;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


}
