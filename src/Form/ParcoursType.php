<?php

namespace App\Form;

use App\Entity\Parcours;
use Symfony\Component\Form\AbstractType;
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
            ->add('handicap')
            ->add('remarque')
            ->add('cv')
            ->add('nomReferent')
            ->add('mailReferent')
            ->add('structure')
            ->add('formation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parcours::class,
        ]);
    }
}
