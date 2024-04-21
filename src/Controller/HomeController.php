<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
/*    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    */
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
}
