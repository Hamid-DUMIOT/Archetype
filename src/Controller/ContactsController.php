<?php

namespace App\Controller;

use App\Form\ContactsType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Smtp\GmailTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactsController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function contact(Request $request, MailerInterface $mailer)
    {

        $form = $this->createForm(ContactsType::class);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();


            $emailcontactform = $contactFormData['Email'];
            $nomcontactform = $contactFormData['Nom'];
            $prenomcontactform = $contactFormData['Prenom'];
            $telephonecontactform = $contactFormData['Telephone'];
            $typecontactform = $contactFormData['Type'];
            $budgetcontactform = $contactFormData['Budget'];
            $messagecontactform = $contactFormData['Message'];

            $message = (new TemplatedEmail())
                ->from($contactFormData['Email'])
                ->to('archetype.contact21@mail.com')
                //mettre le client en cc ? ->cc(...)
                //mettre le logo de l'entreprise (embed(fopen(chemin),'logo'))
                ->subject('Nouvelle demande de contact')
                ->htmlTemplate('/contacts/email.html.twig')
                ->context([

                    'Expediteur' => $contactFormData['Email'], //. \PHP_EOL .
                    'Nom'  => $nomcontactform, //. \PHP_EOL .
                    'Prenom'  => $prenomcontactform, //. \PHP_EOL .
                    'Telephone'  => $telephonecontactform, // . \PHP_EOL .
                    'TypedeProjet' =>  $typecontactform, // . \PHP_EOL .
                    'Budget'  => $budgetcontactform, // . \PHP_EOL .
                    'Message'  => $messagecontactform
                ]);
            $mailer->send($message);

            return $this->redirectToRoute('home');
        }

        return $this->render('/contacts/contacts.html.twig', [
            'contacts_form' => $form->createView()
        ]);

        return  $this->addFlash('Demande traitée avec succès', 'Nous vous répondrons dans les plus brefs délais !');
        //return $this->render('contacts/contacts.html.twig', [
        //    'controller_name' => 'ContactsController',
        //]);
    }
}
