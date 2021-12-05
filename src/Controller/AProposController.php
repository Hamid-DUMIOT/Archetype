<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    /**
     * @Route("/à_propos", name="à_propos")
     */
    public function index(): Response
    {
        return $this->render('APropos/index.html.twig', [
            'controller_name' => 'AProposController',
        ]);
    }
}