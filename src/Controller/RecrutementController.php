<?php

namespace App\Controller;

use App\Classe\FiltreOffre;
use App\Entity\Offre;
use App\Form\PostulerType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;

class RecrutementController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    //Ensemble des offres
    /**
     * @Route("/recrutement", name="recrutement")
     */
    public function index(): Response
    {
        $recrutement = $this->entityManager->getRepository(Offre::class)->findAll();
        // dd($recrutement);

        $filtreOffre = new FiltreOffre();
        $form = $this->createForm(SearchType::class, $filtreOffre);

        return $this->render('recrutement/recrutement.html.twig', [
            'recrutement' => $recrutement,
            'form' => $form->createView()
        ]);

        // $description = $this->entityManager->getDescriptionOffre(Offre::class);
        // if (strlen($description) > 50) {
        //     $debut_texte = substr($description, 0, 50) . "...";
        // }
    }



    //Une seule offre
    /**
     * @Route("/recrutement/{slug}", name="uneOffre")
     */
    public function show_Offre($slug): Response
    {

        $uneOffre = $this->entityManager->getRepository(Offre::class)->findOneBy(['slug' => $slug]);
        // dd($recrutement);

        if (!$uneOffre) {
            return $this->redirectToRoute('recrutement');
        }
        return $this->render('recrutement/show_offre.html.twig', [
            'recrutement' => $uneOffre,
        ]);
    }
}
