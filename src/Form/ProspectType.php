<?php

namespace App\Form;

use App\Entity\ConnuPar;
use App\Entity\Etape;
use App\Entity\Membre;
use App\Entity\Profil;
use App\Entity\Prospect;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProspectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('pwd')
            ->add('login')
            ->add('adresse')
            ->add('cp')
            ->add('ville')
            ->add('tel')
            ->add('role')
            ->add('actif')
            ->add('createdAt')
            ->add('profil',EntityType::class, array(
                    'class' => Profil::class,
                    'choice_label' => 'nom',
                    'multiple'  => false,
            ))
            ->add('parcours')
            ->add('connuPar',EntityType::class, array(
                    'class' => ConnuPar::class,
                    'choice_label' => 'reseau',
                    'multiple'  => false,
            ))
            ->add('membre',EntityType::class, array(
                    'class' => Membre::class,
                    'choice_label' => 'nom',
                    'multiple'  => false,
            ))
            ->add('etape',EntityType::class, array(
                    'class' => Etape::class,
                    'choice_label' => 'nom',
                    'multiple'  => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prospect::class,
        ]);
    }
}
