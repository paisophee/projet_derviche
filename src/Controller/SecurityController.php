<?php

namespace App\Controller;


use App\Entity\Equipe;
use App\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 *
 * @Route("/admin")
 */
class SecurityController extends AbstractController
{
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

                    return $this->redirectToRoute('app_admin_equipe_index');
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
}
