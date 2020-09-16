<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\Parcours;
use App\Entity\Structure;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParcoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numPoleEmploi')
            ->add('cpf')
            ->add('dernierDiplome')
            ->add('dernierEmploi')
            ->add('dernier_contrat')
            ->add('handicap',ChoiceType::class, [
                'choices'  => [
                 
                'Oui' => true,
                'Non' => false,
                ],
                ])
            ->add('remarque')
            ->add('cv',ChoiceType::class, [
                'choices'  => [
                 
                'Oui' => true,
                'Non' => false,
                ],
                ])
            ->add('nomReferent')
            ->add('mailReferent')
            ->add('structure',EntityType::class, array(
                    'class' => Structure::class,
                    'choice_label' => 'nom',
                    'multiple'  => false,
            ))
            ->add('formation',EntityType::class, array(
                    'class' => Formation::class,
                    'choice_label' => 'type',
                    'multiple'  => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parcours::class,
        ]);
    }
}
