<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RendezVousController extends AbstractController
{
    #[Route('/demande-rendez-vous', name: 'app_rendez_vous')]
    public function index(Request $request, EntityManagerInterface $entityManager, Security $security): Response
    {
        $rendezVous = new RendezVous();
        $rendezVous->setDebutant($security->getUser());

        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($rendezVous);
            // Sauvegarde du rendez-vous en base de données
            $entityManager->persist($rendezVous);
            $entityManager->flush();

            // Redirection vers une autre page après la sauvegarde
            return $this->redirectToRoute('app_home');
        }

        return $this->render('rendez_vous/index.html.twig', [
            'formView' => $form->createView(),
        ]);
    }
}
