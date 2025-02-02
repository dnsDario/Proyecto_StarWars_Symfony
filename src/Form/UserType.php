<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Name', 'attr' => ['placeholder' => 'Escriba su nombre']])
            ->add('email', TextType::class, ['label' => 'Email', 'attr' => ['placeholder' => 'Escriba su Correo Electrónico']])
            ->add('password', PasswordType::class, ['label' => 'Password', 'attr' => ['placeholder' => 'Escriba su contraseña']])
            ->add('submit', SubmitType::class, ['label' => 'Sign up'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
