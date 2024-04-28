<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_page')]
    public function index(): Response
    {
        $websiteName = 'BiblioTIPPEE';        
        return $this->render('page/index.html.twig', [
                       'websiteName' => $websiteName,
                   ]); 
    }

    #[Route('/catalogue', name: 'app_catalogue')]
    public function catalogue(): Response
    {
        $websiteName = 'BiblioTIPPEE';        
        return $this->render('catalogue/index.html.twig', [
                       'websiteName' => $websiteName,
                   ]); 
    }

    #[Route('/thematique', name: 'app_thematique')]
    public function thematique(): Response
    {
        $websiteName = 'BiblioTIPPEE';        
        return $this->render('thematique/index.html.twig', [
                       'websiteName' => $websiteName,
                   ]); 
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        $websiteName = 'BiblioTIPPEE';        
        return $this->render('contact/index.html.twig', [
                       'websiteName' => $websiteName,
                   ]); 
    }
}
