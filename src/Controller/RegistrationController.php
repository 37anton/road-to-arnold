<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Entity\Debutant;
use App\Form\CoachRegistrationType;
use App\Form\DebutantRegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/registration-coach', name: 'registration-coach')]
    public function registerCoach(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {

        // Créer un nouvel utilisateur Coach
        $coach = new Coach();

        // Créer le formulaire
        $form = $this->createForm(CoachRegistrationType::class, $coach);

        // Traiter la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // dd($coach);
            $coach->setPassword(
                $userPasswordHasher->hashPassword(
                    $coach,
                    $form->get('password')->getData()
                )
            );

            $entityManager->persist($coach);
            $entityManager->flush();


            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/index-coach.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/registration-debutant', name: 'registration-debutant')]
    public function registerDebutant(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        // Créer un nouvel utilisateur Debutant
        $debutant = new Debutant();

        // Créer le formulaire
        $form = $this->createForm(DebutantRegistrationType::class, $debutant);

        // Traiter la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $debutant->setPassword(
                $userPasswordHasher->hashPassword(
                    $debutant,
                    $form->get('password')->getData()
                )
            );

            $entityManager->persist($debutant);
            $entityManager->flush();


            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/index-debutant.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
