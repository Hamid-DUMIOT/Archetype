<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
<<<<<<< HEAD
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
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
