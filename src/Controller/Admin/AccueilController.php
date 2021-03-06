<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AccueilController
 * @package App\Controller\Admin
 * @Route("/")
 */

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil")
     */
    public function index()
    {
        return $this->render('admin/accueil/index.html.twig');
    }
}

