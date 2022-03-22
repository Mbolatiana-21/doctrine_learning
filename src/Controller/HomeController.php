<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/homepage")
     */
    public function Helloworld(): Response
    {
       $title = "Bienvenue sur la page";

       return $this ->render('homepage/home.html.twig' , [
           'title' => $title,
       ]);
    }
}