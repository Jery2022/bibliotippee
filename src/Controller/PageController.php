<?php

namespace App\Controller;

use App\Repository\DocumentRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        DocumentRepository $documentRepository,
        Security $security,
        ParameterBagInterface $parameterBagInterface
    ): Response {

        $limit = $parameterBagInterface->get('documents_limit');

        $documents = $documentRepository->findBy(['isPublished' => true], ['createdAt' => 'DESC'], $limit);

        $isConnected = $security->isGranted('ROLE_USER');

        //dd($isConnected);

        $websiteName = 'BiblioTIPPEE';

        return $this->render('page/index.html.twig', [
            'websiteName' => $websiteName,
            'documents' => $documents,
            'isConnected' => $isConnected,
        ]);
    }

    #[Route('/document', name: 'app_document')]
    public function document(DocumentRepository $allDocumentRepository): Response
    {

        $documents = $allDocumentRepository->findBy(['isPublished' => true], ['createdAt' => 'DESC']);

        $websiteName = 'BiblioTIPPEE';

        return $this->render('document/index.html.twig', [
            'websiteName' => $websiteName,
            'documents' => $documents,
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
