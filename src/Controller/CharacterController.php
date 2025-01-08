<?php

namespace App\Controller;

use App\Entity\Character;
use App\Form\EditCreateCharacterType;
use App\Manager\FilesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController

{   
    #[Route('/characters', name: 'characters')]
    public function listcharacters(EntityManagerInterface $doctrine)
    {
        $characters = $doctrine->getRepository(Character::class)->findAll();
        return $this->render(
            'characters/characters.html.twig',
            [
            'characters' => $characters
            ]
        );
    }
    #[Route('/showCharacter/{id}', name: 'showCharacter')]
    public function showCharacter(EntityManagerInterface $doctrine, $id)
    {
        $character = $doctrine->getRepository(Character::class)->find($id);
        return $this->render(
            'characters/showCharacter.html.twig',
            [
            'Character' => $character
            ]
        );
    }
    
    #[Route('/editCharacter/{id}', name: 'editCharacter')]
    public function editCharacter(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request, $id)
    {
        $character = $doctrine->getRepository(Character::class)->findOneBy(['id'=> $id]);
        $form = $this->createForm(EditCreateCharacterType::class, $character);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $character = $form->getData();
            $doctrine->persist($character);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImageCharacterName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_characters') //configurar en services.yaml
                );
            }
            $character->setImage("/images/characters/" . $ImageCharacterName);
            $doctrine->flush();
            return $this->redirectToRoute('editCharacter', ['id' => $character->getId()]);
        }
    
        return $this->render(
                'characters/editCreateCharacter.html.twig',
                [
                    'Character' => $character,
                    'CharacterForm' => $form
                ]
            );
    }
    
    #[Route('/createCharacter', name: 'createCharacter')]
    public function createCharacter(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request)
    {
        $form = $this->createForm(EditCreateCharacterType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $character = $form->getData();
            $doctrine->persist($character);
            $image = $form->get('image')->getData();
            if ($image) {
                $ImageCharacterName = $filesManager->upload(
                    $image,
                    $this->getParameter('images_directory_characters') //configurar en services.yaml
                );
            }
            $character->setImage("/images/characters/" . $ImageCharacterName);
            $doctrine->flush();
            return $this->redirectToRoute('editCharacter', ['id' => $character->getId()]);
        }
    
        return $this->render(
                'characters/editCreateCharacter.html.twig',
                [
                    'CharacterForm' => $form
                ]
            );
    }
    
    #[Route("/deleteCharacter/{id}", name: "deleteCharacter")]
        public function deleteCharacter(EntityManagerInterface $doctrine, $id){
            $repository = $doctrine->getRepository(Character::class);
            $character = $repository->find($id);
            $doctrine->remove($character); 
            $doctrine->flush(); 
            $this->addFlash('success', 'Película borrada correctamente');
            return $this->redirectToRoute('characters');
        }
    
}
