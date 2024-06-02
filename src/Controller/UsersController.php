<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UsersType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_users')]
    public function index(): Response
    {
        return $this->render('users/index.html.twig');
    }

    #[Route('/users/{id}/edit/profil', name: 'app_users_edit_profil')]
    public function editProfil(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UsersType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Profil mis à jour avec succès !');
            return $this->redirectToRoute('app_users');
        }

        return $this->render('users/editprofile.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/users/{id}/edit/password', name: 'app_users_edit_password')]
    public function editPassword(Request $request,
        EntityManagerInterface $entityManager,
        Security $security,
        UserPasswordHasherInterface $userPasswordHasher): Response {

        if ($request->isMethod('POST')) {

            $user = new User();
            $userID = $security->getUser()->getId(); // récupération de l'ID de l'entité utilisateur connecté
            $user = $entityManager->getRepository(User::class)->find($userID);

            $oldPassword = $request->request->get('old_password');
            $newPassword = $request->request->get('new_password');
            $confirmPassword = $request->request->get('confirm_password');

            if ($userPasswordHasher->isPasswordValid($user, $oldPassword)) {
                if ($newPassword === $confirmPassword) {
                    $user->setPassword($userPasswordHasher->hashPassword($user, $newPassword));
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $this->addFlash('success', 'Mot de passe mis à jour avec succès !');
                    return $this->redirectToRoute('app_users');
                } else {
                    $this->addFlash('error', 'Les mots de passe ne correspondent pas !');
                }
            } else {
                $this->addFlash('error', 'Ancien mot de passe incorrect !');
            }
        }

        return $this->render('users/editpassword.html.twig');
    }

}
