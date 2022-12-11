<?php

namespace App\Entity;

use App\Repository\SizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SizeRepository::class)]
class Size
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'Size', targetEntity: Boat::class)]
    private Collection $Boat;

    public function __construct()
    {
        $this->Boat = new ArrayCollection();
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
     * @return Collection<int, Boat>
     */
    public function getBoat(): Collection
    {
        return $this->Boat;
    }

    public function addBoat(Boat $boat): self
    {
        if (!$this->Boat->contains($boat)) {
            $this->Boat->add($boat);
            $boat->setSize($this);
        }

        return $this;
    }

    public function removeBoat(Boat $boat): self
    {
        if ($this->Boat->removeElement($boat)) {
            // set the owning side to null (unless already changed)
            if ($boat->getSize() === $this) {
                $boat->setSize(null);
            }
        }

        return $this;
    }
}
