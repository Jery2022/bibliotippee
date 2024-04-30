<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Favori;
use App\Entity\Search;
use App\Entity\Comment;
use App\Entity\Document;
use App\Entity\Download;
use App\Entity\WordSearch;
use App\Entity\PeriodSearch;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend

        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BiblioTIPPEE');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fas fa-home');
        yield MenuItem::section('__________________');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-users', User::class);
        yield MenuItem::linkToCrud('Documents', 'fas fa-map-marker-alt', Document::class);
        yield MenuItem::section('__________________')
            ->setPermission('ROLE_ADMIN', 'ROLE_SUPER_ADMIN');
        yield MenuItem::linkToCrud('Téléchargement', 'fa-solid fa-circle-down', Download::class);
        yield MenuItem::linkToCrud('Favoris', 'fa-solid fa-heart', Favori::class);
        yield MenuItem::linkToCrud('Recherches', 'fas fa-search', Search::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comments', Comment::class);
        yield MenuItem::linkToCrud('Mot Clés', 'fa-regular fa-pen-to-square', WordSearch::class);
        yield MenuItem::linkToCrud('Périodes', 'fa-regular fa-calendar-check', PeriodSearch::class);
    }
}
