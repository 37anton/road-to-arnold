<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalleDeSportController extends AbstractController
{
    #[Route('/salle/de/sport', name: 'app_salle_de_sport')]
    public function index(): Response
    {
        return $this->render('salle_de_sport/index.html.twig', [
            'controller_name' => 'SalleDeSportController',
        ]);
    }
}
