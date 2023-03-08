<?php

namespace App\Entity;

use App\Repository\EnseigneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseigneRepository::class)]
class Enseigne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'enseigne', targetEntity: SalleDeSport::class)]
    private Collection $sallesDeSport;

    public function __construct()
    {
        $this->sallesDeSport = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, SalleDeSport>
     */
    public function getSallesDeSport(): Collection
    {
        return $this->sallesDeSport;
    }

    public function addSallesDeSport(SalleDeSport $sallesDeSport): self
    {
        if (!$this->sallesDeSport->contains($sallesDeSport)) {
            $this->sallesDeSport->add($sallesDeSport);
            $sallesDeSport->setEnseigne($this);
        }

        return $this;
    }

    public function removeSallesDeSport(SalleDeSport $sallesDeSport): self
    {
        if ($this->sallesDeSport->removeElement($sallesDeSport)) {
            // set the owning side to null (unless already changed)
            if ($sallesDeSport->getEnseigne() === $this) {
                $sallesDeSport->setEnseigne(null);
            }
        }

        return $this;
    }
}
