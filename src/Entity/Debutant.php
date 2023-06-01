<?php

namespace App\Entity;

use App\Repository\DebutantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DebutantRepository::class)]
class Debutant extends Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $bio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }
}
