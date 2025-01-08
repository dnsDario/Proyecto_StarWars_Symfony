<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $species = null;


    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Planet $planet = null;

    /**
     * @var Collection<int, Starships>
     */
    #[ORM\ManyToMany(targetEntity: Starships::class, inversedBy: 'characters')]
    private Collection $starships;

    #[ORM\Column(length: 255)]
    private ?string $height = null;

    #[ORM\Column(length: 255)]
    private ?string $mass = null;

    #[ORM\Column(length: 255)]
    private ?string $birthYear = null;

    /**
     * @var Collection<int, Film>
     */
    #[ORM\ManyToMany(targetEntity: Film::class, mappedBy: 'characters')]
    private Collection $films;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function __construct()
    {
        
        $this->starships = new ArrayCollection();
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


    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getPlanet(): ?Planet
    {
        return $this->planet;
    }

    public function setPlanet(?Planet $planet): static
    {
        $this->planet = $planet;

        return $this;
    }

    /**
     * @return Collection<int, Starships>
     */
    public function getStarships(): Collection
    {
        return $this->starships;
    }

    public function addStarship(Starships $starship): static
    {
        if (!$this->starships->contains($starship)) {
            $this->starships->add($starship);
        }

        return $this;
    }

    public function removeStarship(Starships $starship): static
    {
        $this->starships->removeElement($starship);

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): ?string
    {
        return $this->mass;
    }

    public function setMass(string $mass): static
    {
        $this->mass = $mass;

        return $this;
    }

    public function getBirthYear(): ?string
    {
        return $this->birthYear;
    }

    public function setBirthYear(string $birthYear): static
    {
        $this->birthYear = $birthYear;

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
            $film->addCharacter($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): static
    {
        if ($this->films->removeElement($film)) {
            $film->removeCharacter($this);
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

}
