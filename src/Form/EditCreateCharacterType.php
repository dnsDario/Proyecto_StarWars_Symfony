<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Film;
use App\Entity\Planet;
use App\Entity\Starships;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditCreateCharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'nombre', 'attr' => ['placeholder' => 'nombre']])
            ->add('image', FileType::class, [
                'label' => 'imagen',
                'attr' => ['placeholder' => 'imagen'],
                'required' => false,
                'mapped' => false,
                 ])
            ->add('species', TextType::class, ['label' => 'especie', 'attr' => ['placeholder' => 'especie']])
            ->add('height', TextType::class, ['label' => 'altura', 'attr' => ['placeholder' => 'altura']])
            ->add('mass', TextType::class, ['label' => 'peso', 'attr' => ['placeholder' => 'peso']])
            ->add('birthYear', TextType::class, ['label' => 'año de nacimiento', 'attr' => ['placeholder' => 'año de nacimiento']])
            ->add('species', TextType::class, ['label' => 'especie', 'attr' => ['placeholder' => 'especie']])
            ->add('species', TextType::class, ['label' => 'especie', 'attr' => ['placeholder' => 'especie']])
            ->add('films', EntityType::class, [
                'class' => Film::class,
                'choice_label' => 'id',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('planet', EntityType::class, [
                'class' => Planet::class,
                'choice_label' => 'id',
                'expanded' => true,
            ])
            ->add('starships', EntityType::class, [
                'class' => Starships::class,
                'choice_label' => 'id',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
