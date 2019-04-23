<?php

namespace App\Controller\Admin;

use App\Entity\SousCategorie;
use App\Form\SousCategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SousCategorieController
 * @package App\Controller
 *
 * @Route("/souscategorie")
 */
class SousCategorieController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        // afficher les sous categories
        $repository = $this->getDoctrine()->getRepository(SousCategorie::class);
        // filtre les types de sous catégories
        $sousCategories = $repository->findBy([],['type' => 'ASC']);

        return $this->render(
            'admin/sousCategorie/index.html.twig',
            [
                'sousCategories' => $sousCategories
            ]);
    }

    /**
     * @param Request $request
     * @Route("/edition/{id}", defaults={"id":null}, requirements={"id": "\d+"})
     */
    public function edit(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $originalImage = null;

        // creation
        if(is_null($id)){
            $sousCategorie = new SousCategorie();
        //modification
        }else{
            $sousCategorie= $em->find(SousCategorie::class, $id);

            //404 si l'id reçu dans l'URL n'est pas en bdd
            if(is_null($sousCategorie)){
                throw new NotFoundHttpException();
            }

            // si la sous catégorie contient une image
            if(!is_null($sousCategorie->getImage())){
                // nom du fichier venant de la bdd
                $originalImage = $sousCategorie->getImage();
                // on sette l'image avec un objet File sur l'emplacement de l'image pour le traitement par le formulaire
                $sousCategorie->setImage(
                    new File($this->getParameter('upload_dir_sousCategorie') . $originalImage)
                );
            }
        }
        // création du formulaire relié à la catégorie
        $form = $this->createForm(SousCategorieType::class, $sousCategorie);

        //le formulaire analyse la requête et fait le mapping avec l'entité s'il a été soumis
        $form->handleRequest($request);

        //si le formulaire a été soumis
        if($form->isSubmitted()){
            //si les validations à partir des annotations dans l'entité SousCategorie sont ok (@Assert)
            if($form->isValid()){
                /**
                 * @var UploadedFile $image
                 */
                $image = $sousCategorie->getImage();
                // s'il y a une image uploadé
                if(!is_null($image)){
                    //nom sous lequel on va enregistrer l'image. uniqid renvoie un identifiant unique à l'image
                    $filename = uniqid() . '.' . $image->guessExtension();

                    //déplace l'image uploadée
                    $image->move(
                    // vers le répertoire /public/images/categorie
                    // cf config -> service.yaml
                        $this->getParameter('upload_dir_sousCategorie'), $filename
                    );
                    // on sette l'attribut image de l'article avec son nom pour enregistrement en bdd
                    $sousCategorie->setImage($filename);
                    // en modification on supprime l'ancienne image s'il y en a une
                    if(!is_null($originalImage)){

                        unlink($this->getParameter('upload_dir_sousCategorie'). $originalImage);
                    }
                }
                //enregistrement de la sous catégorie en bdd
                $em->persist($sousCategorie);
                $em->flush();
                //message de succès
                $this->addFlash('success', 'La sous catégorie a bien été enregistrée');
                //redirection vers la liste des sous catégories
                return $this->redirectToRoute('app_admin_souscategorie_index');
            }else{
                //message d'erreur
                $this->addFlash('erreur', 'Le formulaire contient des erreurs');
            }
        }
        return $this->render(
            'admin/sousCategorie/edit.html.twig',
        [
            'form' => $form->createView(),
            'original_image' => $originalImage
        ]
        );
    }

    /**
     * @param SousCategorie $sousCategorie
     * @Route("/suppresion/")
     */
    public function delete(SousCategorie $sousCategorie){
        $em = $this->getDoctrine()->getManager();
        $em->remove($sousCategorie);
        $em->flush();
        $this->addFlash('success', 'La sous catégorie a bien été supprimée');
        return $this->redirectToRoute('app_admin_souscategorie_index');
    }
}
