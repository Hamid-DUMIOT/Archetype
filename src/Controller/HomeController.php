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
        $data =$projetRepository->findAll();

        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'projets' => $data ,
            
        ]);
    }
}
