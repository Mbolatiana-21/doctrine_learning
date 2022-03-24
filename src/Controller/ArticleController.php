<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Info;
use Doctrine\Persistence\ManagerRegistry;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="app_article")
     * @Route("/article/{id}")
     */

     
    /*
    Adding data
    public function createArticle(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $article = new Article();
        $article->setArticlename('sweat') ;
        $article->setQuantity(3);
        $article->setReference('ASWT');

        $entityManager->persist($article);

        $entityManager->flush();

        return new Response('Save new article');
    } */

   

    // fecthing data
     public function show(ManagerRegistry $doctrine): Response
     {
         $article = $doctrine->getRepository(Article::class)->findAll();
      
         if (!$article) {
             throw $this->createNotFoundException(
                 'No product find' 
             );
         }
         return $this->render('article/show.html.twig' ,
          ['article' => $article]);
     }


    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
