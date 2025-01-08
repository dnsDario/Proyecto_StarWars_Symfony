<?php

namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\Film;
use App\Entity\Planet;
use App\Entity\Starships;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class APrincipalFixture extends Fixture
{
    protected $httpClient;

    public function __construct(HttpClientInterface $client)
    {
        $this->httpClient = $client;
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 7; $i++) {
            $filmResponse = $this->httpClient->request('GET', 'https://swapi.py4e.com/api/films/' . $i);
            $filmData = $filmResponse->toArray();
            $film = new Film();

            if (!$filmResponse) {
                throw new \Exception('Error al obtener la información de la película');
            } else {
                $film->setTitle(ucfirst($filmData['title']));
                $film->setEpisodeId(ucfirst($filmData['episode_id']));
                $film->setOpeningCrawl(ucfirst($filmData['opening_crawl']));
                $film->setDirector(ucfirst($filmData['director']));
                $film->setProducer(ucfirst($filmData['producer']));
                $film->setReleaseDate($filmData['release_date']);


                foreach ($filmData['characters'] as $characterUrl) {
                    $characterResponse = $this->httpClient->request('GET', $characterUrl);
                    $characterData = $characterResponse->toArray();

                    if (!$characterResponse) {
                        throw new \Exception('Error al obtener la información de personaje');
                    } else {
                        // Verificar si el Character ya existe por nombre
                        $existingCharacter = $manager->getRepository(Character::class)
                            ->findOneBy(['name' => ucfirst($characterData['name'])]);

                        if (!$existingCharacter) {
                            $character = new Character();
                            $character->setName(ucfirst($characterData['name']));

                            // Manejar la especie del personaje
                            if (!empty($characterData['species'])) {
                                $specieResponse = $this->httpClient->request('GET', $characterData['species'][0]);
                                $specieData = $specieResponse->toArray();
                                if (!$specieResponse) {
                                    throw new \Exception('Error al obtener la información de especie');
                                } else {
                                    $character->setSpecies(ucfirst($specieData['name']));
                                }
                            } else {
                                $character->setSpecies('Unknown');
                            }

                            $character->setHeight($characterData['height']);
                            $character->setMass($characterData['mass']);
                            $character->setBirthYear($characterData['birth_year']);
                            //$character->setImage($characterData['image']); la imagen la guardaremos desde formulario editCreateCharacter
                            $manager->persist($character);
                        } else {
                            // Si el Character ya existe, usa el existente
                            $character = $existingCharacter;
                        }

                        $film->addCharacter($character);
                    }
                }

                foreach ($filmData['planets'] as $planetUrl) {
                    $planetResponse = $this->httpClient->request('GET', $planetUrl);
                    $planetData = $planetResponse->toArray();

                    if (!$planetResponse) {
                        throw new \Exception('Error al obtener la información de planeta');
                    } else {
                        $existingPlanet = $manager->getRepository(Planet::class)
                            ->findOneBy(['name' => ucfirst($planetData['name'])]);

                        if (!$existingPlanet) {
                            $planet = new Planet();
                            $planet->setName(ucfirst($planetData['name']));
                            $planet->setPopulation($planetData['population']);
                            $planet->setClimate($planetData['climate']);
                            $planet->setOrbitalPeriod($planetData['orbital_period']);
                            $planet->setRotationPeriod($planetData['rotation_period']);
                            $planet->setTerrain($planetData['terrain']);
                            $planet->setGravity($planetData['gravity']);
                            $planet->setDiameter($planetData['diameter']);
                            $manager->persist($planet);
                        } else {
                            $planet = $existingPlanet;
                        }

                        $film->addPlanet($planet);
                    }
                }

                foreach ($filmData['starships'] as $starshipUrl) {
                    $starshipResponse = $this->httpClient->request('GET', $starshipUrl);
                    $starshipData = $starshipResponse->toArray();

                    if (!$starshipResponse) {
                        throw new \Exception('Error al obtener la información de nave espacial');
                    } else {
                        $existingStarship = $manager->getRepository(Starships::class)
                            ->findOneBy(['name' => $starshipData['name']]);

                        if (!$existingStarship) {
                            $starship = new Starships();
                            $starship->setName(ucfirst($starshipData['name']));
                            $starship->setModel(ucfirst($starshipData['model']));
                            $starship->setCostInCredits($starshipData['cost_in_credits']);
                            $starship->setMaxAtmospheringSpeed($starshipData['max_atmosphering_speed']);
                            $starship->setPassengers($starshipData['passengers']);
                            $starship->setCargoCapacity($starshipData['cargo_capacity']);
                            $starship->setManufacturer($starshipData['manufacturer']);
                            $starship->setLength($starshipData['length']);
                            $manager->persist($starship);
                        } else {
                            $starship = $existingStarship;
                        }

                        $film->addStarship($starship);
                    }
                }

                $manager->persist($film);
            }
            $manager->flush();

            foreach ($filmData['characters'] as $characterUrl) {
                $responseCharacter = $this->httpClient->request('GET', $characterUrl);
                $characterData = $responseCharacter->toArray();

                $foundCharacter = $manager->getRepository(Character::class)->findOneBy(['name' => $characterData['name']]);

                if ($foundCharacter && $responseCharacter) {
                    foreach ($characterData['starships'] as $starshipURL) {
                        $responseStarship = $this->httpClient->request('GET', $starshipURL);
                        $starshipData = $responseStarship->toArray();
                    
                        if (!$responseStarship) {
                            throw new \Exception('Error al obtener la información de nave espacial de SWAPI');
                        } else {
                            $foundStarship = $manager->getRepository(Starships::class)
                                ->findOneBy(['name' => $starshipData['name']]);
                    
                            if ($foundStarship) {
                                $foundCharacter->addStarship($foundStarship);
                            } else {
                                // Crear una nueva nave espacial y asociarla al personaje
                                $newStarship = new Starships();
                                $newStarship->setName(ucfirst($starshipData['name']));
                                $newStarship->setModel(ucfirst($starshipData['model']));
                                $newStarship->setCostInCredits($starshipData['cost_in_credits']);
                                $newStarship->setMaxAtmospheringSpeed($starshipData['max_atmosphering_speed']);
                                $newStarship->setPassengers($starshipData['passengers']);
                                $newStarship->setCargoCapacity($starshipData['cargo_capacity']);
                                $newStarship->setManufacturer($starshipData['manufacturer']);
                                $newStarship->setLength($starshipData['length']);
                                $manager->persist($newStarship);
                    
                                $foundCharacter->addStarship($newStarship);
                            }
                            $manager->persist($foundCharacter);
                        }
                    }
                    
                    $manager->flush();
                    

                    $planetURL = $characterData['homeworld']; // Suponiendo que 'homeworld' es la clave que contiene el enlace del planeta natal
                    $responsePlanet = $this->httpClient->request('GET', $planetURL);

                    if (!$responsePlanet) {
                        throw new \Exception('Error al obtener la información del planeta de SWAPI');
                    } else {
                        $planetData = $responsePlanet->toArray();

                        try {
                            $foundPlanet = $manager->getRepository(Planet::class)
                                ->findOneBy(['name' => $planetData['name']]);

                            if ($foundPlanet) {
                                $foundCharacter->setPlanet($foundPlanet); // Asegúrate de que hay un método setPlanet en tu entidad Character
                            } else {
                                // Crear un nuevo planeta y asociarlo al personaje
                                $newPlanet = new Planet();
                                $newPlanet->setName($planetData['name']);
                                $newPlanet->setPopulation($planetData['population']);
                                $newPlanet->setClimate($planetData['climate']);
                                $newPlanet->setOrbitalPeriod($planetData['orbital_period']);
                                $newPlanet->setRotationPeriod($planetData['rotation_period']);
                                $newPlanet->setTerrain($planetData['terrain']);
                                $newPlanet->setGravity($planetData['gravity']);
                                $newPlanet->setDiameter($planetData['diameter']);
                                $manager->persist($newPlanet);

                                $foundCharacter->setPlanet($newPlanet); // Asegúrate de que hay un método setPlanet en tu entidad Character
                            }
                            $manager->persist($foundCharacter);
                        } catch (\Exception $e) {
                            // Maneja la excepción y continua con el siguiente personaje
                            echo 'Advertencia: ' . $e->getMessage() . "\n";
                        }
                    }

                    $manager->flush();

                }
            }
        }
    }
}