<?php

namespace App\Entity;

use App\Repository\PlanetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanetRepository::class)]
class Planet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $population = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $climate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $orbitalPeriod = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rotationPeriod = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $terrain = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gravity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diameter = null;

    /**
     * @var Collection<int, Character>
     */
    #[ORM\OneToMany(targetEntity: Character::class, mappedBy: 'planet')]
    private Collection $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): static
    {
        $this->population = $population;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getClimate(): ?string
    {
        return $this->climate;
    }

    public function setClimate(?string $climate): static
    {
        $this->climate = $climate;

        return $this;
    }

    public function getOrbitalPeriod(): ?string
    {
        return $this->orbitalPeriod;
    }

    public function setOrbitalPeriod(?string $orbitalPeriod): static
    {
        $this->orbitalPeriod = $orbitalPeriod;

        return $this;
    }

    public function getRotationPeriod(): ?string
    {
        return $this->rotationPeriod;
    }

    public function setRotationPeriod(?string $rotationPeriod): static
    {
        $this->rotationPeriod = $rotationPeriod;

        return $this;
    }

    public function getTerrain(): ?string
    {
        return $this->terrain;
    }

    public function setTerrain(?string $terrain): static
    {
        $this->terrain = $terrain;

        return $this;
    }

    public function getGravity(): ?string
    {
        return $this->gravity;
    }

    public function setGravity(?string $gravity): static
    {
        $this->gravity = $gravity;

        return $this;
    }

    public function getDiameter(): ?string
    {
        return $this->diameter;
    }

    public function setDiameter(?string $diameter): static
    {
        $this->diameter = $diameter;

        return $this;
    }

    /**
     * @return Collection<int, Character>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): static
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
            $character->setPlanet($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getPlanet() === $this) {
                $character->setPlanet(null);
            }
        }

        return $this;
    }
}
