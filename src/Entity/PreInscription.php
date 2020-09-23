<?php

namespace App\Entity;

use App\Repository\PreInscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PreInscriptionRepository::class)
 */
class PreInscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Prospect::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $prospect;

    /**
     * @ORM\ManyToOne(targetEntity=ChargeDe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $chargeDe;

    /**
     * @ORM\ManyToOne(targetEntity=CategFormation::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $categFormation;

    /**
     * @ORM\ManyToOne(targetEntity=Financement::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $financement;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $candidatMontantPartiel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomStructureFinancement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isStructureFinancementValide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProspect(): ?Prospect
    {
        return $this->prospect;
    }

    public function setProspect(Prospect $prospect): self
    {
        $this->prospect = $prospect;

        return $this;
    }

    public function getChargeDe(): ?ChargeDe
    {
        return $this->chargeDe;
    }

    public function setChargeDe(?ChargeDe $chargeDe): self
    {
        $this->chargeDe = $chargeDe;

        return $this;
    }

    public function getCategFormation(): ?CategFormation
    {
        return $this->categFormation;
    }

    public function setCategFormation(?CategFormation $categFormation): self
    {
        $this->categFormation = $categFormation;

        return $this;
    }

    public function getFinancement(): ?Financement
    {
        return $this->financement;
    }

    public function setFinancement(?Financement $financement): self
    {
        $this->financement = $financement;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCandidatMontantPartiel(): ?string
    {
        return $this->candidatMontantPartiel;
    }

    public function setCandidatMontantPartiel(?string $candidatMontantPartiel): self
    {
        $this->candidatMontantPartiel = $candidatMontantPartiel;

        return $this;
    }

    public function getNomStructureFinancement(): ?string
    {
        return $this->nomStructureFinancement;
    }

    public function setNomStructureFinancement(?string $nomStructureFinancement): self
    {
        $this->nomStructureFinancement = $nomStructureFinancement;

        return $this;
    }

    public function getIsStructureFinancementValide(): ?bool
    {
        return $this->isStructureFinancementValide;
    }

    public function setIsStructureFinancementValide(?bool $isStructureFinancementValide): self
    {
        $this->isStructureFinancementValide = $isStructureFinancementValide;

        return $this;
    }
}
