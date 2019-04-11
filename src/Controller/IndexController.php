<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
<<<<<<< HEAD
     * @Route("/index", name="index")
=======
     * @Route("/")
>>>>>>> e07706aa6760f69460849f2ab068cbe42d828cd7
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
