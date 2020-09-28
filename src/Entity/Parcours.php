<?php

namespace App\Entity;

use App\Repository\ParcoursRepository;
use Doctrine\ORM\Mapping as ORM;




/**
 * @ORM\Entity(repositoryClass=ParcoursRepository::class)
 */
class Parcours
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
    private $numPoleEmploi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dernierDiplome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dernierEmploi;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dernier_contrat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $handicap;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomReferent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mailReferent;

    /**
     * @ORM\ManyToOne(targetEntity=Structure::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $structure;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $encoursDiplome;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumPoleEmploi(): ?string
    {
        return $this->numPoleEmploi;
    }

    public function setNumPoleEmploi(?string $numPoleEmploi): self
    {
        $this->numPoleEmploi = $numPoleEmploi;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getDernierDiplome(): ?string
    {
        return $this->dernierDiplome;
    }

    public function setDernierDiplome(?string $dernierDiplome): self
    {
        $this->dernierDiplome = $dernierDiplome;

        return $this;
    }

    public function getDernierEmploi(): ?string
    {
        return $this->dernierEmploi;
    }

    public function setDernierEmploi(?string $dernierEmploi): self
    {
        $this->dernierEmploi = $dernierEmploi;

        return $this;
    }

    public function getDernierContrat(): ?string
    {
        return $this->dernier_contrat;
    }

    public function setDernierContrat(?string $dernier_contrat): self
    {
        $this->dernier_contrat = $dernier_contrat;

        return $this;
    }

    public function getHandicap(): ?string
    {
        return $this->handicap;
    }

    public function setHandicap(?string $handicap): self
    {
        $this->handicap = $handicap;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(?string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getNomReferent(): ?string
    {
        return $this->nomReferent;
    }

    public function setNomReferent(?string $nomReferent): self
    {
        $this->nomReferent = $nomReferent;

        return $this;
    }

    public function getMailReferent(): ?string
    {
        return $this->mailReferent;
    }

    public function setMailReferent(?string $mailReferent): self
    {
        $this->mailReferent = $mailReferent;

        return $this;
    }

    public function getStructure(): ?Structure
    {
        return $this->structure;
    }

    public function setStructure(?Structure $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
    
    public function setId(): self
    {	
    $id = md5(random_bytes(50));
    $this->id = $id;

    return $this;
    }

    public function getEncoursDiplome(): ?string
    {
        return $this->encoursDiplome;
    }

    public function setEncoursDiplome(?string $encoursDiplome): self
    {
        $this->encoursDiplome = $encoursDiplome;

        return $this;
    }
}
