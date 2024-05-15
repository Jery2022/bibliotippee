<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class MailerController extends AbstractController
{
    #[Route('/email', name: 'app_send-email')]
    public function sendEmail(MailerInterface $mailer): void
    {

        $email = (new Email())
            ->from('jewomba@yahoo.fr')
            ->to('jewomab@hotmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        //  try {
        $mailer->send($email);
        //     } catch (TransportExceptionInterface $e) {
        // some error prevented the email sending; display an
        // error message or try to resend the message
        //   }

        // ...
    }
}
