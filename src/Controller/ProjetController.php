<?php

namespace App\Controller;
use App\Entity\Projet;
use App\Entity\Commentaire;
use App\Entity\Publication;
use App\Form\PublicationType;
use App\Form\CommentaireFormType;
use App\Repository\ProjetRepository;
use App\Repository\PublicationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


/**
 * @Route("/projets")
 */
class ProjetController extends AbstractController
{
    /**
     * @Route("/", name="projets_index", methods={"GET"})
     */
    public function index(ProjetRepository $projetRepository, PaginatorInterface $paginator, Request $request): Response
    {

        $data =$projetRepository->findAll();

        $projets = $paginator->paginate(
            $data, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            4 /*limit per page*/
        );




        return $this->render('projets/projets.html.twig', [
            'projets' => $projets ,
        ]);
    }

    /**
     * @Route("/{id}", name="projets_show", methods={"GET" , "POST"})
     */
    public function show(Request $request, Projet $projet): Response
    {

        return $this->render('projets/show.html.twig', [
            'projet' => $projet,
            
        ]);
    }
}
