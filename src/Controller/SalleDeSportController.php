<?php

namespace App\Controller;

use App\Entity\SalleDeSport;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalleDeSportController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/salledesport', name: 'app_salle_de_sport')]
    public function index(): Response
    {
        $salledesports = $this->entityManager->getRepository(SalleDeSport::class)->findall();

        return $this->render('salle_de_sport/index.html.twig', [
            'salledesports' => $salledesports
        ]);
    }

    #[Route('/salledesport/{slug}', name: 'app_salledesport')]
    public function show($slug): Response
    {
        $salledesport = $this->entityManager->getRepository(SalleDeSport::class)->findOneBySlug($slug);

        if(!$salledesport){
            return $this->redirectToRoute('app_salle_de_sport');
        }
        return $this->render('salle_de_sport/show.html.twig', [
            'salledesport' => $salledesport
        ]);
    }
}
