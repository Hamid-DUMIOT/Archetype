<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualite(): Response
    {
        return $this->render('actualite/actualite.html.twig', [
            'controller_name' => 'ActualiteController',
        ]);
    }
}
