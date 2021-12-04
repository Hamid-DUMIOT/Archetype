<?php

namespace App\Controller;

use App\Form\PostulerType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostulerController extends AbstractController
{
    /**
     * @Route("postuler", name="postuler")
     */


    public function postuler(Request $request, MailerInterface $mailer)
    {
        $form_postuler = $this->createForm(PostulerType::class);
        $form_postuler->handleRequest($request);

        if ($form_postuler->isSubmitted() && $form_postuler->isValid()) {
            $postulerFormData = $form_postuler->getData();
            $messagePoste = (new TemplatedEmail())
                ->from($postulerFormData['Email'])
                ->to('archetype.contact21@mail.com')
                //mettre le client en cc ? ->cc(...)
                //mettre le logo de l'entreprise (embed(fopen(chemin),'logo'))
                ->subject('Réponse Offre d\'Emlpoi')
                ->htmlTemplate('/postuler/email.html.twig')
                ->context([
                    'Expediteur' => $postulerFormData['Email'], //. \PHP_EOL .
                    'NomPoste'  => $postulerFormData['NomPoste'],
                    'Nom'  => $postulerFormData['Nom'], //. \PHP_EOL .
                    'Prenom'  => $postulerFormData['Prenom'], //. \PHP_EOL .
                    'Telephone'  => $postulerFormData['Telephone'], // . \PHP_EOL .
                    'Message'  => $postulerFormData['Message'],
                    'files' => $postulerFormData['files']
                ]);
            $mailer->send($messagePoste);
            return $this->redirectToRoute('home');
        }

        return $this->render('postuler/postuler.html.twig', [
            'postuler_form' => $form_postuler->createView()
        ]);
    }
}
