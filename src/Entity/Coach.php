<?php

namespace App\Entity;

use App\Repository\CoachRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachRepository::class)]
class Coach extends Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $prixHoraire = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixHoraire(): ?int
    {
        return $this->prixHoraire;
    }

    public function setPrixHoraire(int $prixHoraire): self
    {
        $this->prixHoraire = $prixHoraire;

        return $this;
    }
}
