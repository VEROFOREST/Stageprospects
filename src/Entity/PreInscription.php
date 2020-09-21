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
     * @ORM\OneToOne(targetEntity=Parcours::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcours;

    /**
     * @ORM\ManyToOne(targetEntity=CategFormation::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $categFormation;

    /**
     * @ORM\ManyToOne(targetEntity=ChargeDe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $chargeDe;

    /**
     * @ORM\ManyToOne(targetEntity=Financement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $financement;

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

    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    public function setParcours(Parcours $parcours): self
    {
        $this->parcours = $parcours;

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

    public function getChargeDe(): ?ChargeDe
    {
        return $this->chargeDe;
    }

    public function setChargeDe(?ChargeDe $chargeDe): self
    {
        $this->chargeDe = $chargeDe;

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
}
