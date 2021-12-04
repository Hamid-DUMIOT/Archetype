<?php

namespace App\Controller\Admin;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


use App\Entity\User;
use App\Entity\Publication;
use App\Entity\Projet;
use App\Entity\TypeOffre;
use App\Entity\Offre;
use EasyCorp\Bundle\EasyAdminBundle\EasyAdminBundle;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {



        return $this->render('bundles\EasyAdminBundle\welcome.html.twig', [
            'user' => []
        ]);
        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ArcheType');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');



        yield  MenuItem::linkToCrud('Publication', 'fa fa-tag', Publication::class);
        yield  MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
        yield  MenuItem::linkToCrud('Projet', 'fa fa-tag', Projet::class);
        yield  MenuItem::linkToCrud('Type d\'offre', 'fas fa-cogs', TypeOffre::class);
        yield  MenuItem::linkToCrud('Offre d\'emploi', 'fas fa-briefcase', Offre::class); //échape le guillement par \


    }
}
