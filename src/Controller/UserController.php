<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route ("/")]
    public function redirectToLogin(): RedirectResponse
    {
        return $this->redirectToRoute('app_login');
    }

    #[Route("newUser", name: "newUser")]
    public function newUser(EntityManagerInterface $doctrine, Request $request, UserPasswordHasherInterface $hash){
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $oldPassword = $user->getPassword();
            $cryptedPassword = $hash->hashPassword($user, $oldPassword); 
            $user->setPassword($cryptedPassword);
            $user->setRoles(['ROLE_USER']); 
            $doctrine->persist($user);
            $doctrine->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render(
            'users/newUser.html.twig',
            [
                'userForm' => $form,
            ]
        );
    }

    #[Route("newAdmin", name: "newAdmin")]
    public function newAdmin(EntityManagerInterface $doctrine, Request $request, UserPasswordHasherInterface $hash){
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $oldPassword = $user->getPassword();
            $cryptedPassword = $hash->hashPassword($user, $oldPassword); 
            $user->setPassword($cryptedPassword); 
            $user->setRoles(['ROLE_ADMIN']); 
            $doctrine->persist($user);
            $doctrine->flush();
            return $this->redirectToRoute('app_login'); 
        }
        return $this->render(
            'users/newUser.html.twig',
            [
                'userForm' => $form,
            ]
        );
    }
}
   