<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $episode_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $opening_crawl = null;

    #[ORM\Column(length: 255)]
    private ?string $director = null;

    #[ORM\Column(length: 255)]
    private ?string $producer = null;

    #[ORM\Column(length: 255)]
    private ?string $release_date = null;


    /**
     * @var Collection<int, Starships>
     */
    #[ORM\ManyToMany(targetEntity: Starships::class, inversedBy: 'films')]
    private Collection $starships;

    /**
     * @var Collection<int, Character>
     */
    #[ORM\ManyToMany(targetEntity: Character::class, inversedBy: 'films')]
    private Collection $characters;

    /**
     * @var Collection<int, Planet>
     */
    #[ORM\ManyToMany(targetEntity: Planet::class, inversedBy: 'films')]
    private Collection $planets;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function __construct()
    {
        $this->starships = new ArrayCollection();
        $this->characters = new ArrayCollection();
        $this->planets = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeId(): ?int
    {
        return $this->episode_id;
    }

    public function setEpisodeId(int $episode_id): static
    {
        $this->episode_id = $episode_id;

        return $this;
    }

    public function getOpeningCrawl(): ?string
    {
        return $this->opening_crawl;
    }

    public function setOpeningCrawl(string $opening_crawl): static
    {
        $this->opening_crawl = $opening_crawl;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): static
    {
        $this->director = $director;

        return $this;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(string $producer): static
    {
        $this->producer = $producer;

        return $this;
    }

    public function getReleaseDate(): ?string
    {
        return $this->release_date;
    }

    public function setReleaseDate(string $release_date): static
    {
        $this->release_date = $release_date;

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
            $starship->addFilm($this);
        }

        return $this;
    }

    public function removeStarship(Starships $starship): static
    {
        $this->starships->removeElement($starship);

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
            $character->addFilm($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        $this->characters->removeElement($character);

        return $this;
    }

    /**
     * @return Collection<int, Planet>
     */
    public function getPlanets(): Collection
    {
        return $this->planets;
    }

    public function addPlanet(Planet $planet): static
    {
        if (!$this->planets->contains($planet)) {
            $this->planets->add($planet);
            $planet->addFilm($this);
        }

        return $this;
    }

    public function removePlanet(Planet $planet): static
    {
        $this->planets->removeElement($planet);

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
