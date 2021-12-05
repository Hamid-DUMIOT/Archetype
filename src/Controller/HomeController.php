<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




 
class HomeController extends AbstractController
{

    private $entityManager;

    
    /**
     * @Route("/", name="home")
     * 
     *
     */

  


    public function index(ProjetRepository $projetRepository): Response
    
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
        $data =$projetRepository->findAll();

        
>>>>>>> develop
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'projets' => $data ,
            
        ]);
=======
<<<<<<< HEAD:src/Controller/MainController.php
        return $this->render('home/index.html.twig');
    }


    /**
     * @Route("/Inscription/{prenom?Hamid}", name="Inscription",
     *  methods={"GET","POST"}, host="localhost",
     * schemes={"http", "https"})
     */
    public function Inscription(Request $request)
    {

        $prenom = $request->get('prenom');

        return $this->render(
            'home/inscription.html.twig'
        );
=======
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
>>>>>>> develop:src/Controller/HomeController.php
>>>>>>> main
    }
}
