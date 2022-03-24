<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Home;
use App\Form\Type\HomeType;

class HomeController extends AbstractController
{
    /**
     * @Route("/homepage")
     */
    
    public function new(Request $request) : Response
    {
        $home = new Home();
        $home -> setArticlename('Veste');
        $home -> setQuantity('4');
        $home -> setReference('VST'); 

        $form = $this->createForm(HomeType::class, $home);
         
        return $this ->render('homepage/home.html.twig',[
            'form' => $form,
        ]);
    } 

  /*
    public function Helloworld(): Response
    {
       $title = "Bienvenue sur la page";

       return $this ->render('homepage/home.html.twig' , [
           'title' => $title,
       ]);
    }*/
}