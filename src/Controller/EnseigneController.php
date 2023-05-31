<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnseigneController extends AbstractController
{
    #[Route('/enseigne', name: 'app_enseigne')]
    public function index(): Response
    {
        return $this->render('enseigne/index.html.twig', [
            'controller_name' => 'EnseigneController',
        ]);
    }
}
