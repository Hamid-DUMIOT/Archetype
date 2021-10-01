<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render(view: 'home/index.html.twig');
    }


    /**
     * @Route("/Inscription/{prenom?Hamid}", name="Inscription",
     *  methods={"GET","POST"}, host="localhost",
     * schemes={"http", "https"})
     */
    public function Inscription(Request $request)
    {

        $prenom = $request->get(key: 'prenom');

        return $this->render(
            view: 'home/inscription.html.twig'
        );
    }
}
