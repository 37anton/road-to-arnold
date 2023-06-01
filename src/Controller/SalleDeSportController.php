<?php

namespace App\Controller;

use App\Entity\SalleDeSport;
use App\Repository\SalleDeSportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalleDeSportController extends AbstractController
{
    #[Route('/salledesport', name: 'app_salle_de_sport')]
    public function index(SalleDeSportRepository $salledesportrepository): Response
    {
        $salledesports = $salledesportrepository->findAll();

        return $this->render('salle_de_sport/index.html.twig', [
            'salledesports' => $salledesports
        ]);
    }


    #[Route('/salledesport', name: 'app_salle_de_sport_unit')]
    public function show(SalleDeSportRepository $salledesportrepository): Response
    {
        $salledesport = $salledesportrepository->findAll();

        return $this->render('salle_de_sport/show.html.twig', [
            'salledesport' => $salledesport
        ]);
    }
}
