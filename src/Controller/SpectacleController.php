<?php


namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Spectacle;
use App\Form\SearchSpectacleType;
use Composer\Command\DumpAutoloadCommand;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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


        /*Theatre*/
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $categoriesTheatre = $repository->findBy(
            [
                'type' => 'theatre'

            ]);

        /*Danse*/
        $categoriesDanse = $repository->findBy(
            [
                'type' => 'danse'

            ]);

        /*Musique*/
        $categoriesMusique = $repository->findBy(
            [
                'type' => 'musique'

            ]);

        /*Eligible moliere*/
        $categoriesMoliere = $repository->findBy(
            [
                'type' => 'Eligible Molières',

            ]);

        /*Autres mime cirque performance*/
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $others = $spectacleRepository->getOthers();


        /*Jeune public*/
        $jeunePublic = $spectacleRepository->getJeunePublic();



        return $this->render(
            'spectacle/index.html.twig',
            [
                'categoriesTheatre' => $categoriesTheatre,
                'categorieDanse'=> $categoriesDanse,
                'categorieMusique'=> $categoriesMusique,
                'categorieMoliere'=> $categoriesMoliere,
                'autres' => $others,
                'jeunePublic' => $jeunePublic
        ]);
    }



    /**
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/single/{id}")
     */
    public function singleSpectacle($id)
    {
        $em = $this->getDoctrine()->getManager();
        $spectacle = $em->find(Spectacle::class,$id);
        if(is_null($spectacle)){
            throw new NotFoundHttpException();
        }

        //$categorie = $em->find(Categorie::class);

        return $this->render('spectacle/single.html.twig',
            [
                'spectacle' => $spectacle,
                //'categorie' => $categorie
            ]);

    }

    /**
     * @Route("/byCategorie/theatreJeunePublic")
     */
    public function theatreJeunePublic()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $theatreJeunePublic = $spectacleRepository->getTheatreJeunePublic();


        return $this->render(
            'spectacleByCategorie/theatreJeunePublic.html.twig',
            [
                'theatreJeunePublic' => $theatreJeunePublic
            ]
            );
    }

    /**
     * @Route("/byCategorie/musiqueJeunePublic")
     */
    public function musiqueJeunePublic()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $musiqueJeunePublic = $spectacleRepository->getMusiqueJeunePublic();


        return $this->render(
            'spectacleByCategorie/musiqueJeunePublic.html.twig',
            [
                'musiqueJeunePublic' => $musiqueJeunePublic
            ]
        );
    }

    /**
     * @Route("/byCategorie/danseJeunePublic")
     */
    public function danseJeunePublic()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $danseJeunePublic = $spectacleRepository->getDanseJeunePublic();


        return $this->render(
            'spectacleByCategorie/danseJeunePublic.html.twig',
            [
                'danseJeunePublic' => $danseJeunePublic
            ]
        );
    }

    /**
     * @Route("/byCategorie/adolescent")
     */
    public function adolescent()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $adolescent = $spectacleRepository->getAdolescent();


        return $this->render(
            'spectacleByCategorie/adolescent.html.twig',
            [
                'adolescent' => $adolescent
            ]
        );
    }

    /**
     * @Route("/byCategorie/danse")
     */
    public function danse()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $danse = $spectacleRepository->getDanse();


        return $this->render(
            'spectacleByCategorie/danse.html.twig',
            [
                'danse' => $danse
            ]
        );
    }

    /**
     * @Route("/byCategorie/theatreClassique")
     */
    public function theatreClassique()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $theatreClassique = $spectacleRepository->getTheatreClassique();


        return $this->render(
            'spectacleByCategorie/theatreClassique.html.twig',
            [
                'theatreClassique' => $theatreClassique
            ]
        );
    }

    /**
     * @Route("/byCategorie/theatreHumour")
     */
    public function theatreHumour()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $theatreHumour = $spectacleRepository->getTheatreHumour();


        return $this->render(
            'spectacleByCategorie/theatreHumour.html.twig',
            [
                'theatreHumour' => $theatreHumour
            ]
        );
    }

    /**
     * @Route("/byCategorie/theatreSeul")
     */
    public function theatreSeul()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $theatreSeul = $spectacleRepository->getTheatreSeul();


        return $this->render(
            'spectacleByCategorie/theatreSeul.html.twig',
            [
                'theatreSeul' => $theatreSeul
            ]
        );
    }

    /**
     * @Route("/byCategorie/theatreContemporain")
     */
    public function theatreContemporain()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $theatreContemporain = $spectacleRepository->getTheatreContemporain();


        return $this->render(
            'spectacleByCategorie/theatreContemporain.html.twig',
            [
                'theatreContemporain' => $theatreContemporain
            ]
        );
    }

    /**
     * @Route("/byCategorie/autres")
     */
    public function autre()
    {
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);
        $autres = $spectacleRepository->getOthers();


        return $this->render(
            'spectacleByCategorie/autres.html.twig',
            [
                'autres' => $autres
            ]
        );
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/search")
     */
    public function searchSpectacle(Request $request)
    {
        /*Formulaire de recherche*/
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);

        $searchform = $this->createForm(SearchSpectacleType::class);

        $searchform->handleRequest($request);

        $spectaclesByRecherche = $spectacleRepository->search((array)$searchform->getData());

        return $this->render(
            'spectacle/search.html.twig',
            [
                'spectaclesByRecherche' => $spectaclesByRecherche,
                'search_form' => $searchform->createView()
            ]
        );




    }

















}
