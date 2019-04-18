<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategorieController
 * @package App\Controller\Admin
 *
 * @Route("/categorie")
 */
class CategorieController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(){

        // afficher toutes les catégories
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        // on ne filtre que les types de catégorie
        $categories = $repository->findBy([], ['type' => 'ASC']);

        return $this->render(
            'admin/categorie/index.html.twig',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * {id} est optionnel, vaut null par défaut et doit etre un nombre si renseigné
     * @Route("/edition/{id}", defaults={"id":null}, requirements={"id": "\d+"})
     */
    public function edit(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $originalImage = null;

        // creation
        if(is_null($id)){
            $categorie = new Categorie();
        //modification
        }else{
            $categorie = $em->find(Categorie::class, $id);

            //404 si l'id reçu dans l'URL n'est pas en bdd
            if(is_null($categorie)){
                throw new NotFoundHttpException();
            }

            // si la catégorie contient une image
            if(!is_null($categorie->getImage())){
                // nom du fichier venant de la bdd
                $originalImage = $categorie->getImage();
                // on sette l'image avec un objet File sur l'emplacement de l'image pour le traitement par le formulaire
                $categorie->setImage(
                    new File($this->getParameter('upload_dir_categorie') . $originalImage)
                );
            }
        }
        // création du formulaire relié à la catégorie
        $form = $this->createForm(CategorieType::class, $categorie);

        //le formulaire analyse la requête et fait le mapping avec l'entité s'il a été soumis
        $form->handleRequest($request);

        //si le formulaire a été soumis
        if($form->isSubmitted()){
            //si les validations à partir des annotations dans l'entité Categorie sont ok (@Assert)
            if($form->isValid()){
                /**
                 * @var UploadedFile $image
                 */
                $image = $categorie->getImage();
                // s'il y a une image uploadé
                if(!is_null($image)){
                    //nom sous lequel on va enregistrer l'image. uniqid renvoie un identifiant unique à l'image
                    $filename = uniqid() . '.' . $image->guessExtension();

                    //déplace l'image uploadée
                    $image->move(
                        // vers le répertoire /public/images/categorie
                        // cf config -> service.yaml
                        $this->getParameter('upload_dir_categorie'), $filename
                    );
                    // on sette l'attribut image de l'article avec son nom pour enregistrement en bdd
                    $categorie->setImage($filename);
                    // en modification on supprime l'ancienne image s'il y en a une
                    if(!is_null($originalImage)){

                        unlink($this->getParameter('upload_dir_categorie'). $originalImage);
                    }
                }
                //enregistrement de la catégorie en bdd
                $em->persist($categorie);
                $em->flush();
                //message de succès
                $this->addFlash('success', 'La catégorie a bien été enregistrée');
                //redirection vers la liste des catégories
                return $this->redirectToRoute('app_admin_categorie_index');
            }else{
                //message d'erreur
                $this->addFlash('erreur', 'Le formulaire contient des erreurs');
            }
        }
        return $this->render(
            'admin/categorie/edit.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     *@Route("/suppression/{id}")
     */
    public function delete(Categorie $categorie){
        $em = $this->getDoctrine()->getManager();
        $em->remove($categorie);
        $em->flush();
        $this->addFlash('success', 'Votre catégorie a bien été supprimé');
        return $this->redirectToRoute('app_admin_categorie_index');
    }

}