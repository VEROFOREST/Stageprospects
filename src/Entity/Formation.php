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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSession1;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSession2;

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

    public function getDateSession1(): ?\DateTimeInterface
    {
        return $this->dateSession1;
    }

    public function setDateSession1(?\DateTimeInterface $dateSession1): self
    {
        $this->dateSession1 = $dateSession1;

        return $this;
    }

    public function getDateSession2(): ?\DateTimeInterface
    {
        return $this->dateSession2;
    }

    public function setDateSession2(?\DateTimeInterface $dateSession2): self
    {
        $this->dateSession2 = $dateSession2;

        return $this;
    }
}
