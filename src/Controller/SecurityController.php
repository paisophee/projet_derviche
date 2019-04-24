<?php

namespace App\Controller;


use App\Entity\Equipe;
use App\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 *
 * @Route("/")
 */
class SecurityController extends AbstractController
{

/* --------------------------------------------------------------------
                   PAGE EQUIPE SEULEMENT POUR SUPER ADMIN
-----------------------------------------------------------------------*/
    /**
     * @Route("super_admin/equipe")
     */
    public function index()
    {
            $repository = $this->getDoctrine()->getRepository(Equipe::class);
            $employes = $repository->findBy([], ['nom' => 'ASC']);

            return $this->render(
                'super_admin/equipe/index.html.twig',
                [
                    'employes' => $employes
                ]
            );
    }

/* --------------------------------------------------------------------
                      FIN PAGE INDEX EQUIPE
-----------------------------------------------------------------------*/


    /**
     * @Route("/inscription/{id}", defaults={"id": null}, requirements={"id": "\d+"})
     */
    public function register(
        Request $request,
        $id,
        UserPasswordEncoderInterface $passwordEncoder

    ) {
        $em = $this->getDoctrine()->getManager();
        if (is_null($id)) {
            $employe = new Equipe();
        } else { // modification
            $employe = $em->find(Equipe::class,$id);
            if (is_null($employe)) {
                throw new NotFoundHttpException();
            }
        }

        $form = $this->createForm(EquipeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $mdp = $passwordEncoder->encodePassword(
                    $employe,
                    $employe->getPlainPassword()
                );

                $employe->setMdp($mdp);

                $em = $this->getDoctrine()->getManager();

                $em->persist($employe);
                $em->flush();

                $this->addFlash('success', 'Le compte a bien été créé');

                return $this->redirectToRoute('app_security_index');
            } else {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render(
            'security/register.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/connexion")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        if (!is_null($this->getUser())){
            return $this->render('bundles/TwigBundle/Exception/error403.html.twig');
        }
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        if (!empty($error)) {
            $this->addFlash('error', 'Identifiants incorrects');
        }

        return $this->render(
            'security/login.html.twig',
            [
                'last_username' => $lastUsername
            ]
        );
    }

    /**
     * @Route("/deconnexion")
     */
    public function logout()
    {

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


        return $this->redirectToRoute('app_security_index');
    }





}
