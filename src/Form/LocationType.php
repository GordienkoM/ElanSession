<?php

namespace App\Form;

use App\Entity\Session;
use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adress', TextType::class, [
                'label_format' => 'Adresse',
                'attr' => ['class' => 'uk-input']
            ])
            ->add('postalCode', TextType::class, [
                'label_format' => 'Code postal',
                'attr' => ['class' => 'uk-input']
            ])
            ->add('city', TextType::class, [
                'label_format' => 'ville',
                'attr' => ['class' => 'uk-input']
            ])
            ->add('valider', SubmitType::class, [
                'label_format' => 'Ajouter un lieu',
                'attr' => ['class' => 'uk-button uk-button-secondary uk-margin-top']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
