<?php

namespace App\Form;

use App\Entity\Coach;
use App\Entity\RendezVous;
use App\Entity\SalleDeSport;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use App\Repository\SalleDeSportRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RendezVousType extends AbstractType
{
    private $salleDeSportRepository;
    private $security;

    public function __construct(SalleDeSportRepository $salleDeSportRepository, Security $security)
    {
        $this->salleDeSportRepository = $salleDeSportRepository;
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $sallesDeSport = $this->salleDeSportRepository->findAll();
        $choices = [];
        foreach ($sallesDeSport as $salleDeSport) {
            $choices[$salleDeSport->getId()] = $salleDeSport->getLibelle();
        }

        $builder
            ->add('salle', EntityType::class, [
                'class' => SalleDeSport::class,
                'choice_label' => 'libelle',
                'choices' => $sallesDeSport,
            ])
            ->add('coach', EntityType::class, [
                'class' => Coach::class,
            ])
            ->add('dateHeure', DateTimeType::class)
            ->add('message', TextareaType::class);;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
