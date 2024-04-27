<?php

namespace App\Controller;

use App\Entity\WordSearch;
use App\Form\WordSearchType;
use App\Repository\WordSearchRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/word/search')]
class WordSearchController extends AbstractController
{
    #[Route('/', name: 'app_word_search_index', methods: ['GET'])]
    public function index(WordSearchRepository $wordSearchRepository): Response
    {
        return $this->render('word_search/index.html.twig', [
            'word_searches' => $wordSearchRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_word_search_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $wordSearch = new WordSearch();
        $form = $this->createForm(WordSearchType::class, $wordSearch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($wordSearch);
            $entityManager->flush();

            return $this->redirectToRoute('app_word_search_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('word_search/new.html.twig', [
            'word_search' => $wordSearch,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_word_search_show', methods: ['GET'])]
    public function show(WordSearch $wordSearch): Response
    {
        return $this->render('word_search/show.html.twig', [
            'word_search' => $wordSearch,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_word_search_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, WordSearch $wordSearch, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WordSearchType::class, $wordSearch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_word_search_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('word_search/edit.html.twig', [
            'word_search' => $wordSearch,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_word_search_delete', methods: ['POST'])]
    public function delete(Request $request, WordSearch $wordSearch, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wordSearch->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($wordSearch);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_word_search_index', [], Response::HTTP_SEE_OTHER);
    }
}
