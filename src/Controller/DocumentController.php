<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Comment;
use App\Entity\Document;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use App\Repository\DocumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[Route('/document')]
class DocumentController extends AbstractController
{
    #[Route('/', name: 'app_document_index', methods: ['GET'])]
    public function index(DocumentRepository $documentRepository): Response
    {
        $allDocuments = $documentRepository->findBy(
            ['isPublished' => true],
            ['createdAt' => 'DESC']
        );

        $websiteName = 'BiblioTIPPEE';

        return $this->render('document/index.html.twig', [
            'websiteName' => $websiteName,
            'documents' => $allDocuments,
        ]);
    }


    #[Route('/{id}', name: 'app_document_show', methods: ['GET', 'POST'])]
    public function show(
        Document $document,
        Request $request,
        EntityManagerInterface $entityManager,
        Security $security,
        CommentRepository $commentRepository,
        SessionInterface $session,
    ): Response {

        $session->set('previous_url', $request->getUri());
        $averageRate = $commentRepository->getAverageByComment($document->getId());
        $user = $security->getUser();

        $comment = $commentRepository->findOneBy([
            'documents'  => $document,
            'users'      => $user,
        ]);

        if (!$comment) {

            $createdAt = new DateTimeImmutable();
            $comment = new Comment();
            $comment->setDocuments($document);
            $comment->setUsers($user);
            $comment->setIsValided(false);
            $comment->setCreatedAt($createdAt);
        }

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest(($request));

        if ($form->isSubmitted() && $form->isValid()) {

            // ... perform some action, such as saving the task to the database
            $entityManager->persist($comment);
            $entityManager->flush();

            // return $this->redirectToRoute('comment_success');
        }

        //dd($document->getFileNameImageDocument());

        return $this->render('document/show.html.twig', [
            'document'      => $document,
            'form'          => $form,
            'user'          => $user,
            'averageRate'   => $averageRate,
        ]);
    }
}
