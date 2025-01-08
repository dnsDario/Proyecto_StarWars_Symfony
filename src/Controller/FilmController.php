<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\EditCreateFilmType;
use App\Manager\FilesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{   
#[Route('/films', name: 'films')]
public function listFilms(EntityManagerInterface $doctrine)
{
    $films = $doctrine->getRepository(Film::class)->findAll();
    return $this->render(
        'films/films.html.twig',
        [
        'films' => $films
        ]
    );
}
#[Route('/showFilm/{id}', name: 'showFilm')]
public function showFilm(EntityManagerInterface $doctrine, $id)
{
    $film = $doctrine->getRepository(Film::class)->find($id);
    return $this->render(
        'films/showFilm.html.twig',
        [
        'film' => $film
        ]
    );
}

#[Route('/editFilm/{id}', name: 'editFilm')]
public function editFilm(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request, $id)
{
    $film = $doctrine->getRepository(Film::class)->findOneBy(['episode_id'=> $id]);
    $form = $this->createForm(EditCreateFilmType::class, $film);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $film = $form->getData();
        $doctrine->persist($film);
        $image = $form->get('image')->getData();
        if ($image) {
            $ImageFilmName = $filesManager->upload(
                $image,
                $this->getParameter('images_directory')
            );
        }
        $film->setImage("/images/" . $ImageFilmName);
        $doctrine->flush();
        return $this->redirectToRoute('editFilm', ['id' => $film->getEpisodeId()]);
    }

    return $this->render(
            'films/editCreateFilm.html.twig',
            [
                'film' => $film,
                'filmForm' => $form
            ]
        );
}

}