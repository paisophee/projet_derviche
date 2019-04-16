<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SpectacleController extends AbstractController
{
    /**
     * @Route("/spectacles")
     */
    public function index()
    {
        return $this->render('spectacle/index.html.twig', [
            'controller_name' => 'SpectacleController',
        ]);
    }
}
