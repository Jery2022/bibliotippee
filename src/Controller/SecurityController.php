<?php

namespace App\Controller;

use App\Form\ResetPasswordFormType;
use App\Form\ResetPasswordRequestType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/mot-de-passe-oublie', name: 'app_forgot_pwd')]
    public function forgotPassword(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer,
        TokenGeneratorInterface $tokenGenerator
    ): Response {

        //on crée un formulaire de demande de réinitialisation du mot de passe
        $form = $this->createForm(ResetPasswordRequestType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //on va chercher les données qui se trouve dans le formulaire à la clé email
            $email = $form->get('email')->getData();

            //on va chercher l'utilisateur qui a l'email
            $user = $userRepository->findOneByEmail(['email' => $email]);

            if ($user) {

                // on regenere un token
                $token = $tokenGenerator->generateToken();

                try {
                    $user->setReseToken($token);
                    $entityManager->persist($user);
                    $entityManager->flush();

                } catch (\Exception $e) {
                    $this->addFlash('danger', 'Un problème est survenu lors de la modification du mot de passe. Merci de réessayer plus tard !');
                    return $this->redirectToRoute('app_forgot_pwd');
                }

                //lien de réinitialisation du mot de passe
                $url = $this->generateUrl('app_reset_pwd', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

                // $context=compact('user','url');
                //création du mail de réinitialisation du mot de passe
                $message = (new Email())
                    ->from('no-reply@test.com') // email de l'expéditeur
                    ->to($user->getEmail()) // email du destinataire
                    ->subject('Réinitialisation de votre mot de passe')
                    ->html('<p>Bonjour ' . $user->getFullName() . ',</p><p> Vous avez sollicité la réinitialisation de votre mot de passe.</p><p> Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe : <a href="' . $url . '">Réinitialiser mon mot de passe</a></p><p>Si vous n\'êtes pas à l\'origine de cette demande, veuillez ignorer ce message.</p><p>Cordialement,</p><p>L\'équipe de BiblioTIPPEE</p>');

                $mailer->send($message);

                $this->addFlash('success', 'Un email vous a été envoyé. Merci de bien vouloir vérifier  votre messagérie !');
                return $this->redirectToRoute('app_forgot_pwd');
            }

            $this->addFlash('danger', 'Oups! Un problème est survenu, veuillez réessayer plus tard.');
            return $this->redirectToRoute('app_forgot_pwd');

        }

        return $this->render('security/forgot_password.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route(path: '/mot-de-passe-oublie/{token}', name: 'app_reset_pwd')]
    public function resetPassword(
        string $token,
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): Response {

        $user = $userRepository->findOneByReseToken($token);

        if ($user) {
            $form = $this->createForm(ResetPasswordFormType::class);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                //on efface le token
                $user->setReseToken(null);
                $user->setPassword(
                    $passwordHasher
                        ->hashPassword($user, $form->get('password')->getData()));

                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'Mot de passe changé avec succès !');
                return $this->redirectToRoute('app_login');
            }
            return $this->render('security/reset_password.html.twig', [
                'resetPassword' => $form->createView(),
            ]);
        }
        $this->addFlash('danger', 'Token est  invalide ou expiré');
        return $this->redirectToRoute('app_login');

    }
}
