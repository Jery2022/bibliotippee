<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageEnConstructionController extends AbstractController
{
    #[Route('/construction', name: 'app_page_en_construction')]
    public function index(): Response
    {
        $websiteName = 'BiblioTIPPEE'; 
        return $this->render('page_en_construction/index.html.twig', [
            'websiteName' => $websiteName,
        ]); 
    }
}
