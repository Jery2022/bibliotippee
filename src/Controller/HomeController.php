<?php

namespace App\Controller;

use Twig\Environment;
use App\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Environment $twig, DocumentRepository $documentRepository): Response
    {
                return new Response($twig->render('home/index.html.twig', [
                       'homepage' => $documentRepository->findAll(),
                   ]));
    }
}
