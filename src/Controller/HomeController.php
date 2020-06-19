<?php

namespace App\Controller;


use App\Entity\Projects;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        
        $repository = $this->getDoctrine()->getRepository(Projects::class);
        $projectsBack = $repository->findByType(array('type' => 'back'));
        
        $projectsFront = $repository->findByType(array('type' => 'front'));
        
        
        return $this->render('home/index.html.twig', [
            'projectsBack' => $projectsBack,
            'projectsFront' => $projectsFront,
        ]);
    }
}
