<?php

namespace App\Entity;

use App\Repository\BoatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoatRepository::class)]
class Boat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'OneToMany')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $Type = null;

    #[ORM\ManyToOne(inversedBy: 'Boat')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Size $Size = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column]
    private ?float $priceHour = null;

    #[ORM\Column(length: 2048)]
    private ?string $resume = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->Type;
    }

    public function setType(?Type $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getSize(): ?Size
    {
        return $this->Size;
    }

    public function setSize(?Size $Size): self
    {
        $this->Size = $Size;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getPriceHour(): ?float
    {
        return $this->priceHour;
    }

    public function setPriceHour(float $priceHour): self
    {
        $this->priceHour = $priceHour;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }
}
