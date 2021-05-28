<?php

namespace App\Form;

use App\Entity\Session;
use App\Entity\Trainee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TraineeSassionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('sessions', EntityType::class, [
                'label_format' => 'Ajoute le stagiaire à une session',
                'class'         => Session::class,
                'choice_label'  => 'title',
                //multiple permet afficher plusieur session
                'multiple' => true,
                //permet d'etaler l'affichage case à cocher
                'expanded' => true,
                //permet de faire une mise à jour systèmatique entre le stagiaire et la session
                'by_reference' => false,
                'attr'          => ['class' => 'uk-input']
            ])
            ->add('valider', SubmitType::class, [
                'label_format' => 'Ajouter la session',
                'attr' => ['class' => 'uk-button uk-button-secondary uk-margin-top']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trainee::class,
        ]);
    }
}
