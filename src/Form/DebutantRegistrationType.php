<?php

namespace App\Form;

use App\Entity\Debutant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DebutantRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('prenom')
            ->add('nom')
            ->add('ville')
            ->add('code_postal')
            ->add('adresse')
            ->add('telephone')
            ->add('genre')
            ->add('bio');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Debutant::class,
        ]);
    }
}
