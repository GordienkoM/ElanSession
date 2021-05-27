<?php

namespace App\Form;

use App\Entity\Session;
use App\Entity\Location;
use App\Entity\Training;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label_format' => 'Nom de la session',
                'attr' => ['class' => 'uk-input']
            ])
            ->add('minimumTrainees', TextType::class, [
                'label_format' => 'Nombre MIN de Stagiaire',
                'attr' => ['class' => 'uk-input']
            ])
            ->add('maximumTrainees', TextType::class, [
                'label_format' => 'Nombre MAX de Stagiaire',
                'attr' => ['class' => 'uk-input']
            ])
            ->add('startDate', DateType::class, [
                'label_format' => 'Date de début',
                'attr'   => ['class' => 'uk-input'],
                'widget' => 'single_text'
            ])
            ->add('endDate', DateType::class, [
                'label_format' => 'Date de fin',
                'attr'   => ['class' => 'uk-input'],
                'widget' => 'single_text'
            ])
            ->add('location', EntityType::class, [
                'label_format' => 'Lieux de formation',
                'class'         => Location::class,
                'choice_label'  => 'adress',
                'attr'          => ['class' => 'uk-input']
            ])
            ->add('training', EntityType::class, [
                'label_format' => 'Type de formation',
                'class'         => Training::class,
                'choice_label'  => 'title',
                'attr'          => ['class' => 'uk-input']
            ])
            ->add('valider', SubmitType::class, [
                'label_format' => 'Ajouter la session',
                'attr' => ['class' => 'uk-button uk-button-secondary uk-margin-top']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
