<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use App\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    /**
     * @Route("/equipe")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Equipe::class);
        $employes = $repository->findBy([], ['nom' => 'ASC']);

        return $this->render(
            'admin/equipe/index.html.twig',
            [
                'employes' => $employes
            ]
        );

    }


    /**
     * @Route("/suppression/{id}")
     */


    public function delete(Equipe $employe)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($employe);
        $em->flush();

        $this->addFlash('success', 'L\'employé(e) a bien été supprimé(e)');


        return $this->redirectToRoute('app_admin_equipe_index');
    }



}
