<?php

namespace App\Controller;

use App\Entity\Starships;
use App\Form\EditCreateStarshipType;
use App\Manager\FilesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StarshipsController extends AbstractController

{   
    #[Route('/starship', name: 'starship')]
    public function listStarship(EntityManagerInterface $doctrine)
    {
        $starship = $doctrine->getRepository(Starships::class)->findAll();
        return $this->render(
            'starship/starship.html.twig',
            [
            'starship' => $starship
            ]
        );
    }
    #[Route('/showStarships/{id}', name: 'showStarships')]
    public function showStarships(EntityManagerInterface $doctrine, $id)
    {
        $Starships = $doctrine->getRepository(Starships::class)->find($id);
        return $this->render(
            'starship/showStarships.html.twig',
            [
            'starships' => $Starships
            ]
        );
    }
    
    #[Route('/editStarships/{id}', name: 'editStarships')]
    public function editStarships(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request, $id)
    {
        $Starships = $doctrine->getRepository(Starships::class)->findOneBy(['id'=> $id]);
        $form = $this->createForm(EditCreateStarshipType::class, $Starships);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $Starships = $form->getData();
            $doctrine->persist($Starships);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImageStarshipsName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_starship') //configurar en services.yaml
                );
            }
            $Starships->setImage("/images/starship/" . $ImageStarshipsName);
            $doctrine->flush();
            return $this->redirectToRoute('editStarships', ['id' => $Starships->getId()]);
        }
    
        return $this->render(
                'starship/editCreateStarships.html.twig',
                [
                    'starships' => $Starships,
                    'starshipsForm' => $form
                ]
            );
    }
    
    #[Route('/createStarships', name: 'createStarships')]
    public function createStarships(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request)
    {
        $form = $this->createForm(EditCreateStarshipType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $Starships = $form->getData();
            $doctrine->persist($Starships);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImageStarshipsName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_starship') //configurar en services.yaml
                );
            }
            $Starships->setImage("/images/starship/" . $ImageStarshipsName);
            $doctrine->flush();
            return $this->redirectToRoute('editStarships', ['id' => $Starships->getId()]);
        }
    
        return $this->render(
                'starship/editCreateStarships.html.twig',
                [
                    'starshipsForm' => $form
                ]
            );
    }
    
    #[Route("/deleteStarships/{id}", name: "deleteStarships")]
        public function deleteStarships(EntityManagerInterface $doctrine, $id){
            $repository = $doctrine->getRepository(Starships::class);
            $Starships = $repository->find($id);
            $doctrine->remove($Starships); 
            $doctrine->flush(); 
            $this->addFlash('success', 'Nave espacial borrada correctamente');
            return $this->redirectToRoute('starship');
        }
    
}