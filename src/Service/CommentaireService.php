<?php

namespace App\Service;

use App\Entity\Commentaire;
use App\Entity\Publication;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class CommentaireService
{

    private $manager;
    private $flash;


    public function __construct(EntityManagerInterface $manager, FlashBagInterface $flash)
    {
        $this-> manager = $manager;
        $this -> flash = $flash;
    }

    public function persistCommentaire(Commentaire $com, Publication $publication): void
    {

        $com->setDateCom(new \DateTime());
        $com->setPublication($publication);
        $this->manager->persist($com);
        $this->manager->flush();
        $this->flash->add('success','Merci pour votre commentaire');






    }
}