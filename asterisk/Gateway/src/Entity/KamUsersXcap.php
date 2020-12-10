<?php

namespace Pegasus\Gateway\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KamUsersXcap
 *
 * @ORM\Table(name="kam_users_xcap", uniqueConstraints={@ORM\UniqueConstraint(name="doc_uri", columns={"doc_uri"})}, indexes={@ORM\Index(name="username", columns={"username", "domain", "doc_type"}), @ORM\Index(name="username_2", columns={"username", "domain", "doc_type", "doc_uri"}), @ORM\Index(name="username_3", columns={"username", "domain", "doc_uri"})})
 * @ORM\Entity(repositoryClass="Pegasus\Gateway\Repository\KamUsersXcapRepository")
 */
class KamUsersXcap
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
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=190, nullable=false)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="doc", type="blob", length=65535, nullable=false)
     */
    private $doc;

    /**
     * @var int
     *
     * @ORM\Column(name="doc_type", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $docType;

    /**
     * @var string
     *
     * @ORM\Column(name="etag", type="string", length=64, nullable=false)
     */
    private $etag;

    /**
     * @var int
     *
     * @ORM\Column(name="source", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="doc_uri", type="string", length=255, nullable=false)
     */
    private $docUri;

    /**
     * @var int
     *
     * @ORM\Column(name="port", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $port;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getDoc()
    {
        return $this->doc;
    }

    public function setDoc($doc): self
    {
        $this->doc = $doc;

        return $this;
    }

    public function getDocType(): ?int
    {
        return $this->docType;
    }

    public function setDocType(int $docType): self
    {
        $this->docType = $docType;

        return $this;
    }

    public function getEtag(): ?string
    {
        return $this->etag;
    }

    public function setEtag(string $etag): self
    {
        $this->etag = $etag;

        return $this;
    }

    public function getSource(): ?int
    {
        return $this->source;
    }

    public function setSource(int $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getDocUri(): ?string
    {
        return $this->docUri;
    }

    public function setDocUri(string $docUri): self
    {
        $this->docUri = $docUri;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }


}
