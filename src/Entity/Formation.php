<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $duree;

   

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu_Formation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuFormation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coutFormation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $matSupp;

    /**
     * @ORM\ManyToOne(targetEntity=SessionFormation::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $sessionFormation;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

   

    public function getContenuFormation(): ?string
    {
        return $this->contenu_Formation;
    }

    public function setContenuFormation(?string $contenu_Formation): self
    {
        $this->contenu_Formation = $contenu_Formation;

        return $this;
    }

    public function getLieuFormation(): ?string
    {
        return $this->lieuFormation;
    }

    public function setLieuFormation(?string $lieuFormation): self
    {
        $this->lieuFormation = $lieuFormation;

        return $this;
    }

    public function getCoutFormation(): ?string
    {
        return $this->coutFormation;
    }

    public function setCoutFormation(?string $coutFormation): self
    {
        $this->coutFormation = $coutFormation;

        return $this;
    }

    public function getMatSupp(): ?bool
    {
        return $this->matSupp;
    }

    public function setMatSupp(?bool $matSupp): self
    {
        $this->matSupp = $matSupp;

        return $this;
    }

    public function getSessionFormation(): ?SessionFormation
    {
        return $this->sessionFormation;
    }

    public function setSessionFormation(?SessionFormation $sessionFormation): self
    {
        $this->sessionFormation = $sessionFormation;

        return $this;
    }

    
}
