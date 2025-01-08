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

class EditCreateFilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Título', 'attr' => ['placeholder' => 'Título']])
            ->add('episode_id', TextType::class, ['label' => 'Episodio', 'attr' => ['placeholder' => 'Episodio']])
            ->add('opening_crawl', TextType::class, ['label' => 'Crawl de apertura', 'attr' => ['placeholder' => 'Crawl de apertura']])
            ->add('director', TextType::class, ['label' => 'Director', 'attr' => ['placeholder' => 'Director']])
            ->add('producer', TextType::class, ['label' => 'Productor', 'attr' => ['placeholder' => 'Productor']])
            ->add('release_date', TextType::class, ['label' => 'Fecha de lanzamiento', 'attr' => ['placeholder' => 'Fecha de lanzamiento']])
            ->add('image', FileType::class, [
                'label' => 'Imagen',
                 'attr' => ['placeholder' => 'Imagen'],
                 'required' => false,
                 'mapped' => false, //el archivo no se guarda en la base de datos, solo la ruta
                 ])
            ->add('characters', EntityType::class, [
                'class' => Character::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('planets', EntityType::class, [
                'class' => Planet::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('starships', EntityType::class, [
                'class' => Starships::class,
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
            'data_class' => Film::class,
        ]);
    }
}
