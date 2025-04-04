<?php

namespace App\Form;

use App\Entity\Avion;
use App\Entity\Modele;
use App\Entity\Vol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('refModele', EntityType::class, [
                'class' => Modele::class,
                'choice_label' => 'modele',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avion::class,
        ]);
    }
}
