<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Spectacle;
use App\Form\SearchSpectacleType;
use App\Form\SpectacleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class CategorieController
 * @package App\Controller\Admin
 * @Route("/spectacles")
 */
class SpectaclesController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(Request $request)
    {
        $Repository = $this->getDoctrine()->getRepository(Spectacle::class);
        //$spectacles = $repository->findAll();
        $searchform = $this->createForm(SearchSpectacleType::class);
        $searchform->handleRequest($request);

        $spectacles = $Repository->search((array)$searchform->getData());

        return $this->render('admin/spectacles/index.html.twig',
        [
            'spectacles' => $spectacles,
            'search_form' => $searchform->createView()
        ]
        );


    }


    /**
     *
     * @Route("/edition/{id}", defaults={"id": null}, requirements={"id" : "\d+"})
     */
    public function edit(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $originalImage1 = null;
        $originalImage2 = null;
        $originalImage3 = null;


        if(is_null($id)){
            $spectacle = new Spectacle();

        }else{
            $spectacle = $em->find(Spectacle::class,$id);
            // 404 si l'id reçu n'existe pas en bdd
            if(is_null($spectacle)){
                throw new NotFoundHttpException();
            }
            if(!is_null($spectacle->getImage1())){
                $originalImage1 = $spectacle->getImage1();
                $spectacle->setImage1(
                    new File($this->getParameter('upload_dir_spectacle') . $originalImage1)
                );
            }
            if(!is_null($spectacle->getImage2())){
                $originalImage2 = $spectacle->getImage2();
                $spectacle->setImage2(
                    new File($this->getParameter('upload_dir_spectacle') . $originalImage2)
                );
            }
            if(!is_null($spectacle->getImage3())){
                $originalImage3 = $spectacle->getImage3();
                $spectacle->setImage3(
                    new File($this->getParameter('upload_dir_spectacle') . $originalImage3)
                );
            }
        }

        // formulaire

        $form = $this->createForm(SpectacleType::class, $spectacle);
        $form ->handleRequest($request);
        if($form->isSubmitted()){
            if($form->isValid()){

                // IMAGE 1
                /** @var UploadedFile $image1**/
                $image1 = $spectacle->getImage1();
                // s'il ya eu une image1 uplaodée
                if(!is_null($image1)){
                    // nom sous lequel on va enregistrer  l'image
                    $filename = uniqid() . '.' . $image1->guessExtension();
                    //déplace l'image uplaodée
                    $image1->move(
                    // vers le répertoire /public/images/spectacles
                    // cf config/services.yaml
                        $this->getParameter('upload_dir_spectacle'),
                        // nom du fichier
                        $filename
                    );
                    //on sette l"attribut image de l'article avec son nom
                    // pour enregistrement en bdd
                    $spectacle->setImage1($filename);

                    //en modification on supprime l'ancienne image
                    // s'il y en a une
                    if(!is_null($originalImage1)){
                        unlink($this->getParameter('upload_dir_spectacle') . $originalImage1);
                    }
                }else{
                    // en modification, sans upload, on sette l'attribut image
                    // avec le nom de l'ancienne image
                    $spectacle->setImage1($originalImage1);
                }

                // IMAGE 2
                /** @var UploadedFile $image2**/
                $image2 = $spectacle->getImage2();
                // s'il ya eu une image2 uplaodée
                if(!is_null($image2)){
                    // nom sous lequel on va enregistrer  l'image
                    $filename = uniqid() . '.' . $image2->guessExtension();
                    //déplace l'image uplaodée
                    $image2->move(
                    // vers le répertoire /public/images/spectacles
                    // cf config/services.yaml
                        $this->getParameter('upload_dir_spectacle'),
                        // nom du fichier
                        $filename
                    );
                    //on sette l"attribut image de l'article avec son nom
                    // pour enregistrement en bdd
                    $spectacle->setImage2($filename);

                    //en modification on supprime l'ancienne image
                    // s'il y en a une
                    if(!is_null($originalImage2)){
                        unlink($this->getParameter('upload_dir_spectacle') . $originalImage2);
                    }
                }else{
                    // en modification, sans upload, on sette l'attribut image
                    // avec le nom de l'ancienne image
                    $spectacle->setImage2($originalImage2);
                }



                // IMAGE 3
                /** @var UploadedFile $image3**/
                $image3 = $spectacle->getImage3();
                // s'il ya eu une image3 uplaodée
                if(!is_null($image3)){
                    // nom sous lequel on va enregistrer  l'image
                    $filename = uniqid() . '.' . $image3->guessExtension();
                    //déplace l'image uplaodée
                    $image3->move(
                    // vers le répertoire /public/images/spectacles
                    // cf config/services.yaml
                        $this->getParameter('upload_dir_spectacle'),
                        // nom du fichier
                        $filename
                    );
                    //on sette l"attribut image de l'article avec son nom
                    // pour enregistrement en bdd
                    $spectacle->setImage3($filename);

                    //en modification on supprime l'ancienne image
                    // s'il y en a une
                    if(!is_null($originalImage3)){
                        unlink($this->getParameter('upload_dir_spectacle') . $originalImage3);
                    }
                }else{
                    // en modification, sans upload, on sette l'attribut image
                    // avec le nom de l'ancienne image
                    $spectacle->setImage3($originalImage3);
                }



                $em->persist($spectacle);
                $em->flush();



                //message
                $this->addFlash('success', 'Le nouveau spectacle est enregistré');
                return $this->redirectToRoute('app_admin_spectacles_index');

            }else{
            //message erreur
            $this->addFlash('error', 'Votre enregistrement contient des erreurs');
            }
        }
        return $this->render('admin/spectacles/edit.html.twig',
            [
                'form' => $form->createView(),
                'original_image1' => $originalImage1,
                'original_image2' => $originalImage2,
                'original_image3' => $originalImage3

            ]);


    }


    /**
     *@Route("/suppression/{id}")
     */
    public function delete(Spectacle $spectacle){
        $em = $this->getDoctrine()->getManager();
        $em->remove($spectacle);
        $em->flush();
        $this->addFlash('success', 'Votre spectacle a bien été supprimé');
        return $this->redirectToRoute('app_admin_spectacles_index');
    }







    /**
     * @Route("/ajax/content/{id}")
     */
    public function ajaxContent(Request $request, Spectacle $spectacle)
    {
        // va verifier que la page a été appelé en ajax
        if($request->isXmlHttpRequest()){
            //pour un retour en texte brut et activer dans admin_article.js
            //return new Response($article->getContent());




            /* POUR UN RETOUR EN JSON, FAIT LA MEME CHOSE QU'AU DESSUS MAIS UTILISE DU JSON
            $response = [
                'content' => nl2br($article->getContent())
            ];

            // JsonResponse encode le tableau $response en Json et retournera du json
            return new JsonResponse($response);
            */




            // POUR UN RETOUR DU RENDU DUN TEMPLATE EN TWIG
            return $this->render(
                'admin/spectacles/ajax_content.html.twig',
                [
                    'spectacle' => $spectacle
                ]
            );
        }else{
            throw new NotFoundHttpException();
        }


    }
}
