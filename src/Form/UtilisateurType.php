<?php

namespace App\Form;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Modele;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('nom')
            ->add('prenom')
            ->add('ville')
            ->add('date_naissance')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Pilote' => 'ROLE_PILOTE',
                    'Admin' => 'ROLE_ADMIN',
                ],
                'label' => 'Rôles',
                'multiple' => true,
                'expanded' => true,
            ]);

                $builder->add('refModele', EntityType::class, [
                    'class' => Modele::class,
                    'choice_label' => function (Modele $modele) {
                        return $modele->getMarque() . ' - ' . $modele->getModele();
                    },
                    'label' => 'Modèle',
                    'required' => false,
                ]);

            $builder->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmez le mot de passe'],
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'mapped' => false // Ce champ n'existe pas dans l'entité User
            ]);

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
