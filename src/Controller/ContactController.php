<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $websiteName = 'BiblioTIPPEE';

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $email = htmlentities($contactFormData['email']);
            $subject = $contactFormData['subject'];
            $content = htmlentities($contactFormData['content']);

            // Préparation de l'email
            $email = (new Email())
                ->from($email)
                ->to('jewomba@hotmail.com')
                ->subject($subject)
                ->text($content);

            try {
                // Envoi de l'email
                $mailer->send($email);
                $this->addFlash('success', 'Votre email a bien été envoyé !');
                return $this->redirectToRoute('app_contact');

            } catch (TransportExceptionInterface $e) {
                // some error prevented the email sending; display an
                // error message or try to resend the message
                $errorMsg = 'Une erreur est survenue lors de l\'envoi de l\'email';
                return $this->render('contact/index.html.twig', [
                    'websiteName' => $websiteName,
                    'form' => $form->createView(),
                    'errorMsg' => $errorMsg,
                ]);
            }
        }

        //$successMsg = 'Votre email a bien été envoyé !';
        //return $this->redirectToRoute('app_contact');
        return $this->render('contact/index.html.twig', [
            'websiteName' => $websiteName,
            'form' => $form->createView(),
            // 'successMsg' => $successMsg,
        ]);
    }
}
