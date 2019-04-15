<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(Request $request)
    {
        // afficher toutes les catégories
        $repository = $this->getDoctrine()->getRepository(Categorie::class);








        return $this->render('admin/categorie/index.html.twig');
    }
}
