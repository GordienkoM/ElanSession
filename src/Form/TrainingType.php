<?php

namespace App\Form;

use App\Entity\Module;
use App\Entity\Training;
use App\Entity\TypeTraining;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'uk-input']
            ])
            ->add('modules', EntityType::class, [
                'class'         => Module::class,
                'choice_label'  => 'title',
                'attr'          => ['class' => 'uk-input'],
                //permet d'afficher plusieurs sessions dans un champ
                'multiple'      => true,
                //permet d'étaler l'affichage en cases à cocher.
                'expanded'      => true
            ])
            ->add('typeTraining', EntityType::class, [
                'attr' => ['class' => 'uk-input'],
                'class'         => TypeTraining::class,
                'choice_label'  => 'title',
            ])
            ->add('valider', SubmitType::class, [
                'label_format' => 'Ajouter une formation',
                'attr' => ['class' => 'uk-button uk-button-secondary uk-margin-top']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Training::class,
        ]);
    }
}
