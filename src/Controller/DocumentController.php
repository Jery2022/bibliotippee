<?php

namespace App\Controller;
use App\Entity\Document;
use App\Repository\DocumentRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;


class DocumentController extends AbstractController
{
    #[Route('/document', name: 'documents')]
    public function index(Environment $twig, DocumentRepository $documentRepository): Response 
    {    
       {
            return new Response($twig->render('document/index.html.twig', [
                    'document' => $documentRepository->findAll(),
                   ])); 

        }
    }


    #[Route('/document/{id}', name: 'document')]
    public function show(Environment $twig, Document $document, CommentRepository $commentRepository): Response
    {
        return new Response($twig->render('document/show.html.twig', [
            'document' => $document,
            'comments' => $commentRepository->findBy(['document' => $document], ['createdAt' => 'DESC']),
        ]));
    }
}