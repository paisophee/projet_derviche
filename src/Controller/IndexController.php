<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        if (!is_null($this->getUser())){
            return $this->render('admin/accueil/index.html.twig');
        }else{
            return $this->render('index/index.html.twig');
        }


    }


}
