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

        return new Response(
            <<<EOF
            <html>
                <body style="background-color:powderblue;">
                    <div style="display:flex; flex-direction:column;justify-content:center; align-items:center">
                        <h1>Bienvenue sur <span style="color:red;">BiblioTIPPEE</span></h1>
                        <p>Site de gestion des documents de la CNTIPPEE </p>
                        <img src="/images/under-construction.gif" alt="En construction" />
                    </div>
                 </body>
            </html>
            EOF
        );
    }
       /*        
        return new Response($twig->render('home/index.html.twig', [
                       'homepage' => $documentRepository->findAll(),
                   ])); 
    }*/
}
