<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Film;
use App\Entity\Planet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditCreatePlanetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nombre', 'attr' => ['placeholder' => 'Nombre del Planeta']])
            ->add('population', TextType::class, ['label' => 'Población', 'attr' => ['placeholder' => 'Población']])
            ->add('image', FileType::class, [
                'label' => 'Imagen', 
                'attr' => ['placeholder' => 'Imagen'],
                'required' => false,
                'mapped' => false,
                 ])
            ->add('climate')
            ->add('orbitalPeriod')
            ->add('rotationPeriod')
            ->add('terrain')
            ->add('gravity')
            ->add('diameter')
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
                'required' => false,
            ])            
            ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planet::class,
        ]);
    }
}
