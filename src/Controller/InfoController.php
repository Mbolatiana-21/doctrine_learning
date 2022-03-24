<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Info;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Article;

class InfoController extends AbstractController
{
    /**
     * @Route("/info", name="app_info")
     */

    public function show(ManagerRegistry $doctrine): Response
    {
        $info = $doctrine->getRepository(Info::class)->findAll();
        $article = $doctrine->getRepository(Article::class)->findAll();

        if (!$info) {
            throw $this->createNotFoundException(
                'No product info find ' 
            );
        }
        return $this->render('article/index.html.twig' ,
         ['info' => $info , 'article' => $article]);
    }

    
}
