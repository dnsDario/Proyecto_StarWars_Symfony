<?php

namespace App\Controller;

use App\Entity\Planet;
use App\Form\EditCreatePlanetType;
use App\Manager\FilesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlanetController extends AbstractController

{   
    #[Route('/planets', name: 'planets')]
    public function listplanets(EntityManagerInterface $doctrine)
    {
        $planets = $doctrine->getRepository(Planet::class)->findAll();
        return $this->render(
            'planets/planets.html.twig',
            [
            'planets' => $planets
            ]
        );
    }
    #[Route('/showPlanet/{id}', name: 'showPlanet')]
    public function showPlanet(EntityManagerInterface $doctrine, $id)
    {
        $planet = $doctrine->getRepository(Planet::class)->find($id);
        return $this->render(
            'planets/showPlanet.html.twig',
            [
            'planet' => $planet
            ]
        );
    }
    
    #[Route('/editPlanet/{id}', name: 'editPlanet')]
    public function editPlanet(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request, $id)
    {
        $planet = $doctrine->getRepository(Planet::class)->findOneBy(['id'=> $id]);
        $form = $this->createForm(EditCreatePlanetType::class, $planet);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $planet = $form->getData();
            $doctrine->persist($planet);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImagePlanetName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_planets') //configurar en services.yaml
                );
            }
            $planet->setImage("/images/planets/" . $ImagePlanetName);
            $doctrine->flush();
            return $this->redirectToRoute('editPlanet', ['id' => $planet->getId()]);
        }
    
        return $this->render(
                'planets/editCreatePlanet.html.twig',
                [
                    'planet' => $planet,
                    'planetForm' => $form
                ]
            );
    }
    
    #[Route('/createPlanet', name: 'createPlanet')]
    public function createPlanet(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request)
    {
        $form = $this->createForm(EditCreatePlanetType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $planet = $form->getData();
            $doctrine->persist($planet);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImagePlanetName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_planets') //configurar en services.yaml
                );
            }
            $planet->setImage("/images/planets/" . $ImagePlanetName);
            $doctrine->flush();
            return $this->redirectToRoute('editPlanet', ['id' => $planet->getId()]);
        }
    
        return $this->render(
                'planets/editCreatePlanet.html.twig',
                [
                    'planetForm' => $form
                ]
            );
    }
    
    #[Route("/deletePlanet/{id}", name: "deletePlanet")]
        public function deletePlanet(EntityManagerInterface $doctrine, $id){
            $repository = $doctrine->getRepository(Planet::class);
            $planet = $repository->find($id);
            $doctrine->remove($planet); 
            $doctrine->flush(); 
            $this->addFlash('success', 'Planeta borrado correctamente');
            return $this->redirectToRoute('planets');
        }
    
}