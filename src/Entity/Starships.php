<?php

namespace App\Entity;

use App\Repository\StarshipsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarshipsRepository::class)]
class Starships
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $costInCredits = null;

    #[ORM\Column(length: 255)]
    private ?string $maxAtmospheringSpeed = null;

    #[ORM\Column(length: 255)]
    private ?string $passengers = null;

    #[ORM\Column(length: 255)]
    private ?string $cargoCapacity = null;

    #[ORM\Column(length: 255)]
    private ?string $manufacturer = null;

    #[ORM\Column(length: 255)]
    private ?string $length = null;

    /**
     * @var Collection<int, Character>
     */
    #[ORM\ManyToMany(targetEntity: Character::class, mappedBy: 'starships')]
    private Collection $characters;

    /**
     * @var Collection<int, Film>
     */
    #[ORM\ManyToMany(targetEntity: Film::class, mappedBy: 'starships')]
    private Collection $films;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->films = new ArrayCollection();
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

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

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

    public function getCostInCredits(): ?string
    {
        return $this->costInCredits;
    }

    public function setCostInCredits(string $costInCredits): static
    {
        $this->costInCredits = $costInCredits;

        return $this;
    }

    public function getMaxAtmospheringSpeed(): ?string
    {
        return $this->maxAtmospheringSpeed;
    }

    public function setMaxAtmospheringSpeed(string $maxAtmospheringSpeed): static
    {
        $this->maxAtmospheringSpeed = $maxAtmospheringSpeed;

        return $this;
    }

    public function getPassengers(): ?string
    {
        return $this->passengers;
    }

    public function setPassengers(string $passengers): static
    {
        $this->passengers = $passengers;

        return $this;
    }

    public function getCargoCapacity(): ?string
    {
        return $this->cargoCapacity;
    }

    public function setCargoCapacity(string $cargoCapacity): static
    {
        $this->cargoCapacity = $cargoCapacity;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): static
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(string $length): static
    {
        $this->length = $length;

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
            $character->addStarship($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        if ($this->characters->removeElement($character)) {
            $character->removeStarship($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Film $film): static
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->addStarship($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): static
    {
        if ($this->films->removeElement($film)) {
            $film->removeStarship($this);
        }

        return $this;
    }

}
