<?php

namespace App\Entity;

use App\Repository\DebutantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DebutantRepository::class)]
class Debutant extends Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
