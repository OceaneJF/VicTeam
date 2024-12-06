<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(ArticleRepository $articleRepository): Response
    {

          $articles = $articleRepository->findBy([], ['dateCreation' => 'DESC'], 3);
        return $this->render('index/index.html.twig', [
            'articles' => $articles,
            'controller_name' => 'IndexController',
        ]);
    }
}
