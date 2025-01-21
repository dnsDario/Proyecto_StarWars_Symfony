<?php

namespace App\Controller;

use App\Entity\Starships;
use App\Form\EditCreateStarshipType;
use App\Manager\FilesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StarshipController extends AbstractController

{   
    #[Route('/starships', name: 'starships')]
    public function listStarship(EntityManagerInterface $doctrine)
    {
        $starships = $doctrine->getRepository(Starships::class)->findAll();
        return $this->render(
            'starships/starships.html.twig',
            [
            'starships' => $starships
            ]
        );
    }
    #[Route('/showStarship/{id}', name: 'showStarship')]
    public function showStarships(EntityManagerInterface $doctrine, $id)
    {
        $starship = $doctrine->getRepository(Starships::class)->find($id);
        return $this->render(
            'starships/showStarship.html.twig',
            [
            'starship' => $starship
            ]
        );
    }
    
    #[Route('/editStarship/{id}', name: 'editStarship')]
    public function editStarships(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request, $id)
    {
        $starship = $doctrine->getRepository(Starships::class)->findOneBy(['id'=> $id]);
        $form = $this->createForm(EditCreateStarshipType::class, $starship);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $starship = $form->getData();
            $doctrine->persist($starship);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImageStarshipsName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_starships') //configurar en services.yaml
                );
                $starship->setImage("/images/starships/" . $ImageStarshipsName);
            }
            $doctrine->flush();
            return $this->redirectToRoute('showStarship', ['id' => $starship->getId()]);
        }
    
        return $this->render(
                'starships/editCreateStarship.html.twig',
                [
                    'starship' => $starship,
                    'starshipForm' => $form
                ]
            );
    }
    
    #[Route('/createStarship', name: 'createStarship')]
    public function createStarships(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request)
    {
        $form = $this->createForm(EditCreateStarshipType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $starship = $form->getData();
            $doctrine->persist($starship);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImageStarshipsName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_starship') //configurar en services.yaml
                );
                $starship->setImage("/images/starship/" . $ImageStarshipsName);
            }
            $doctrine->flush();
            return $this->redirectToRoute('showStarship', ['id' => $starship->getId()]);
        }
    
        return $this->render(
                'starships/editCreateStarship.html.twig',
                [
                    'starshipForm' => $form
                ]
            );
    }
    
    #[Route("/deleteStarship/{id}", name: "deleteStarship")]
        public function deleteStarships(EntityManagerInterface $doctrine, $id){
            $repository = $doctrine->getRepository(Starships::class);
            $starship = $repository->find($id);
            $doctrine->remove($starship); 
            $doctrine->flush(); 
            $this->addFlash('success', 'Nave espacial borrada correctamente');
            return $this->redirectToRoute('starship');
        }
    
}