<?php

namespace App\Controller\Admin;

use App\Entity\Enseigne;
use App\Entity\Ville;
use App\Entity\SalleDeSport;
use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator){

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ClientCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Road To Arnold');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Retour au site', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Client', 'fa-solid fa-users', Client::class);
        yield MenuItem::linkToCrud('Salle de Sport', 'fa-solid fa-dumbbell', SalleDeSport::class);
        yield MenuItem::linkToCrud('Enseigne', 'fa-solid fa-shop', Enseigne::class);
        yield MenuItem::linkToCrud('Ville', 'fa-solid fa-city', Ville::class);
    }
}
