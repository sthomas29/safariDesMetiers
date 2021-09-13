<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Famille;
use App\Entity\RegimeAlimentaire;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($this->get(AdminUrlGenerator::class)->setController(UserCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
//        if ('sthomas@campus-eni.fr' === $this->getUser()->getUserIdentifier()) {
//            return $this->redirect('app_login');
//        }

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //return $this->render('admin/dashboard.html.twig');

        //return parent::index();
    }



    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Safari Des Metiers');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs','fas fa-list', User::class);
        yield MenuItem::linkToCrud('Famille', 'fas fa-list', Famille::class);
        yield MenuItem::linkToCrud('Régime', 'fas fa-list', RegimeAlimentaire::class);
        yield MenuItem::linkToCrud('Animaux', 'fas fa-list', Animal::class);
    }
}
