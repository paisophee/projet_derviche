<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SpectacleController
 * @package App\Controller
 * @Route("/spectacles")
 */
class SpectacleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('spectacle/index.html.twig', [
            'controller_name' => 'SpectacleController',
        ]);
    }
}
