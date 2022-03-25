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
use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController
{
    /**
     * @Route("/homepage")
     */
    
    public function new(Request $request ,ManagerRegistry $doctrine) : Response
    {
        $home = new Home();
       
        $form = $this->createForm(HomeType::class, $home);

        /* ajout donne dans la base */
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($home);
            $em->flush();
          
        }
        
        //affichage donne
        $home = $doctrine->getRepository(Home::class)->findAll();

        return $this ->renderForm('homepage/home.html.twig',[
            'form' => $form,
            'home' => $home
        ]);
    } 

   /* public function show(ManagerRegistry $doctrine): Response
    {
        $home = $doctrine->getRepository(Home::class)->findAll();
     
        if ($home) {
            throw $this->createNotFoundException(
                ' product find' 
            );
        }
        return $this->render('homepage/home.html.twig' ,
         ['home' => $home]);
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