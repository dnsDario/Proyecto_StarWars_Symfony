<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Film;
use App\Entity\Planet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditCreatePlanetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('population')
            ->add('image')
            ->add('climate')
            ->add('orbitalPeriod')
            ->add('rotationPeriod')
            ->add('terrain')
            ->add('gravity')
            ->add('diameter')
            ->add('characters', EntityType::class, [
                'class' => Character::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('films', EntityType::class, [
                'class' => Film::class,
                'choice_label' => 'id',
                'multiple' => true,
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
