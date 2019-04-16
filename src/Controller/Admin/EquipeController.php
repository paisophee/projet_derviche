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
        $personnes = $repository->findBy([], ['nom' => 'ASC']);

        return $this->render(
            'admin/equipe/index.html.twig',
            [
                'personnes' => $personnes
            ]
        );

    }

    /**
     *
     * @Route("/edition/{id}", defaults={"id": null}, requirements={"id": "\d+"})
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        if (is_null($id)) { // création
            $personne = new Equipe();
        } else { // modification
            $personne = $em->find(Equipe::class, $id);
            if (is_null($personne)) {
                throw new NotFoundHttpException();
            }
        }

        // CREATION FORMULAIRE
        $form = $this->createForm(EquipeType::class, $personne);

        $form->handleRequest($request);

        dump($personne);


        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                // enregistrement en bdd
                $em->persist($personne);
                $em->flush();

                // message de confirmation
                $this->addFlash('success', 'Nouvel(le) employé(e) enregistré(e)');
                // redirection vers la page de liste
                return $this->redirectToRoute('app_admin_equipe_index');
            } else {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render(
            'admin/equipe/edit.html.twig',
            [
                // passage du formulaire au template
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/suppression/{id}")
     */
    public function delete(Equipe $personne)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($personne);
        $em->flush();

        $this->addFlash('success', 'L\'employé(e) a bien été supprimé(e)');


        return $this->redirectToRoute('app_admin_equipe_index');
    }



    /**
     * @Route("/ajax/content/{id}")
     */
    public function ajaxContent(Request $request, Equipe $personne)
    {
        // si la page a été appelée en AJAX
        if ($request->isXmlHttpRequest()) {

            // retour du rendu d'un template twig
            return $this->render(
                'admin/equipe/ajax_content.html.twig',
                [
                    'personne' => $personne
                ]
            );
        } else {
            throw new NotFoundHttpException();
        }

    }
}
