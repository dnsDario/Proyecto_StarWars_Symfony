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
    /* El parámetro Request $request debe ir justo antes del parámetro $id, porque Symfony necesita primero instanciar la solicitud antes de poder extraer los parámetros de ruta, como $id. Esto se debe a que el objeto Request contiene toda la información sobre la solicitud HTTP, incluyendo los parámetros de ruta y los datos de entrada. */
    #[Route('/editCharacter/{id}', name: 'editCharacter')]
    public function editcharacter(EntityManagerInterface $doctrine, FilesManager $filesManager, Request $request, $id)
    {
        $character = $doctrine->getRepository(character::class)->find($id);
        $form = $this->createForm(EditCreateCharacterType::class, $character);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $character = $form->getData();
            $doctrine->persist($character);
            $doctrine->flush();
            return $this->redirectToRoute('character', ['id' => $character->getId()]);
        }

        return $this->render(
            'characters/editCharacter.html.twig',
            [
                'character' => $character
            ]
        );
    }
}