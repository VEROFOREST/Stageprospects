<?php

namespace App\Form;

use App\Entity\ConnuPar;
use App\Entity\Etape;
use App\Entity\Membre;
use App\Entity\Parcours;
use App\Entity\Profil;
use App\Entity\Prospect;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class ProspectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('pwd', PasswordType::class)
            ->add('login')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('cp')
            ->add('ville')
            ->add('tel')
            ->add('dateNaissance',BirthdayType::class, [
                    'placeholder' => [
                        'year' => 'Année',
                         'month' => 'Mois',
                          'day' => 'Jour',
                    ],
                    'widget' => 'single_text',
                    'attr' => ['class' => 'js-datepicker']])
            ->add('lieuNaissance')
            ->add('deptNaissance')
            ->add('nationalite')
            ->add('role', HiddenType::class,[])
            ->add('actif', HiddenType::class,[])
            ->add('createdAt', HiddenType::class,[],DateTime::class)
            ->add('profil',EntityType::class, array(
                    'class' => Profil::class,
                    'choice_label' => 'nom',
                    'multiple'  => false,
            ))
            ->add('parcours',
                    HiddenType::class,[],
                    EntityType::class, array(
                    'class' => Parcours::class,
                    'choice_label' => 'id',
                    'multiple'  => false,
            ))
            ->add('connuPar',EntityType::class, array(
                    'class' => ConnuPar::class,
                    'choice_label' => 'reseau',
                    'multiple'  => false,
            ))
            ->add('membre',HiddenType::class,[],
                        EntityType::class, array(
                    'class' => Membre::class,
                    'choice_label' => 'id',
                    'multiple'  => false,
            ))
            ->add('etape',
                    HiddenType::class,[],
                    EntityType::class, array(
                    'class' => Etape::class,
                    'choice_label' => 'id',
                    'multiple'  => false,
            ))
            ->add('save_and_add', SubmitType::class, array('label' => 'Me recontacter',
                                                           'attr' => array('class' => 'btn btn-info  btn-lg ')));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prospect::class,
        ]);
    }
}
