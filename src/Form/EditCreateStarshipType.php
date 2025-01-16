<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Film;
use App\Entity\Starships;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditCreateStarshipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nombre', 'attr' => ['placeholder' => 'Nombre de la Nave Espacial']])  
            ->add('model', TextType::class, ['label' => 'Modelo', 'attr' => ['placeholder' => 'Modelo']])
            ->add('image', FileType::class, [
                'label' => 'Imagen', 
                'attr' => ['placeholder' => 'Imagen'],
                'required' => false,
                'mapped' => false,
            ])
            ->add('costInCredits', TextType::class, ['label' => 'Coste', 'attr' => ['placeholder' => 'Coste']])
            ->add('maxAtmospheringSpeed', TextType::class, ['label' => 'Velocidad en atmósfera', 'attr' => ['placeholder' => 'Velocidad en atmósfera']])
            ->add('passengers', TextType::class, ['label' => 'Capacidad de tripulación', 'attr' => ['placeholder' => 'Capacidad de tripulación']])
            ->add('cargoCapacity', TextType::class, ['label' => 'Capacidad de carga', 'attr' => ['placeholder' => 'Capacidad de carga']])
            ->add('manufacturer', TextType::class, ['label' => 'Fabricada por', 'attr' => ['placeholder' => 'Fabricada por']])
            ->add('length', TextType::class, ['label' => 'Largo', 'attr' => ['placeholder' => 'Largo']])
            ->add('films', EntityType::class, [
                'class' => Film::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('characters', EntityType::class, [
                'class' => Character::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Starships::class,
        ]);
    }
}
