<?php

namespace App\Form;

use App\Entity\TypeTraining;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TypeTrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'uk-input']
            ])
            ->add('valider', SubmitType::class, [
                'label_format' => 'Ajouter une catégorie de formation',
                'attr' => ['class' => 'uk-button uk-button-secondary uk-margin-top']
            ]);
        // ->add('color');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TypeTraining::class,
        ]);
    }
}
