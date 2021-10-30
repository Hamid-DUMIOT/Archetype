<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NousTrouverController extends AbstractController
{
    /**
     * @Route("/nous-trouver", name="nous_trouver")
     */
    public function index(): Response
    {
        return $this->render('nous_trouver/index.html.twig', [
            'controller_name' => 'NousTrouverController',
        ]);
    }
}
