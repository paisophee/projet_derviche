<?php

namespace App\Repository;

use App\Entity\Spectacle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Spectacle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Spectacle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Spectacle[]    findAll()
 * @method Spectacle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpectacleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Spectacle::class);
    }

    public function getOthers()
    {
        $qb = $this->createQueryBuilder('s');

        $types = [
            'Cirque',
            'Mime',
            'Performance'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.categorie', 'c')
            ->andWhere($expr->in('c.type', $types))
        ;

        $query = $qb->getQuery();

        return $query->getResult();
    }


    public function getJeunePublic()
    {
        $qb = $this->createQueryBuilder('s');
        $spectateur = [
            'Jeune public'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.spectateur', 'sp')
            ->andWhere($expr->in('sp.type',$spectateur))
            ;
        $query = $qb->getQuery();

        return $query->getResult();


    }

    public function getTheatreJeunePublic()
    {
        $qb = $this->createQueryBuilder('s');
        $spectateur = [
            'Jeune public'
        ];
        $categorie =[
            'Théâtre'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.spectateur', 'sp')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('sp.type',$spectateur))
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }

    public function getMusiqueJeunePublic()
    {
        $qb = $this->createQueryBuilder('s');
        $spectateur = [
            'Jeune public'
        ];
        $categorie =[
            'Musique'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.spectateur', 'sp')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('sp.type',$spectateur))
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }

    public function getDanseJeunePublic()
    {
        $qb = $this->createQueryBuilder('s');
        $spectateur = [
            'Jeune public'
        ];
        $categorie =[
            'Danse'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.spectateur', 'sp')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('sp.type',$spectateur))
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }

    public function getAdolescent()
    {
        $qb = $this->createQueryBuilder('s');
        $spectateur = [
            'Adolescent'
        ];


        $expr = $qb->expr();

        $qb
            ->join('s.spectateur', 'sp')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('sp.type',$spectateur))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }

    public function getDanse()
    {
        $qb = $this->createQueryBuilder('s');

        $categorie =[
            'Danse'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.spectateur', 'sp')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }

    public function getTheatreClassique()
    {
        $qb = $this->createQueryBuilder('s');
        $sousCateg = [
            'Classique'
        ];
        $categorie =[
            'Théâtre'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.sousCategorie', 'ss')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('ss.type',$sousCateg))
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }

    public function getTheatreHumour()
    {
        $qb = $this->createQueryBuilder('s');
        $sousCateg = [
            'Humour'
        ];
        $categorie =[
            'Théâtre'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.sousCategorie', 'ss')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('ss.type',$sousCateg))
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }


    public function getTheatreSeul()
    {
        $qb = $this->createQueryBuilder('s');
        $sousCateg = [
            'Seul.e en scène'
        ];
        $categorie =[
            'Théâtre'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.sousCategorie', 'ss')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('ss.type',$sousCateg))
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }


    public function getTheatreContemporain()
    {
        $qb = $this->createQueryBuilder('s');
        $sousCateg = [
            'Contemporain'
        ];
        $categorie =[
            'Théâtre'
        ];

        $expr = $qb->expr();

        $qb
            ->join('s.sousCategorie', 'ss')
            ->join('s.categorie','sc')
            ->andWhere($expr->in('ss.type',$sousCateg))
            ->andWhere($expr->in('sc.type',$categorie))
        ;
        $query = $qb->getQuery();

        return $query->getResult();


    }


    public function search(array $filters = [])
    {
        $qb = $this->createQueryBuilder('s');
        $qb->orderBy('s.titre','ASC');
        $expr = $qb->expr();


        //filtres

        if(!empty($filters['titre'])){
            $qb
                ->andWhere('s.titre LIKE :titre')
                ->setParameter('titre','%'. $filters['titre'] . '%')
            ;
        }

        if(!empty($filters['categorie'])){
            $qb
                ->join('s.categorie','c')
                ->andWhere($expr->in('c.id', [$filters['categorie']->getId()]))
                //->setParameter('categorie',$filters['categorie'])
            ;
        }

        if(!empty($filters['sous_categorie'])){
            $qb
                ->andWhere('s.sousCategorie =:sous_categorie')
                ->setParameter('sous_categorie',$filters['sous_categorie'])
            ;
        }

        if(!empty($filters['spectateur'])){
            $qb
                ->andWhere('s.spectateur =:spectateur')
                ->setParameter('spectateur',$filters['spectateur'])
            ;
        }


        if(!empty($filters['nom_cie'])){
            $qb
                ->andWhere('s.nom_cie LIKE :nom_cie')
                ->setParameter('nom_cie','%'. $filters['nom_cie'] . '%')
            ;
        }

        if(!empty($filters['pays'])){
            $qb
                ->andWhere('s.pays =:pays')
                ->setParameter('pays',$filters['pays'])
            ;
        }

        if(!empty($filters['departement'])){
            $qb
                ->andWhere('s.departement =:departement')
                ->setParameter('departement',$filters['departement'])
            ;
        }



        $query = $qb->getQuery();


        return $query->getResult();
    }


    public function getDepartements()
    {
        return [75 => 75, 28 => 28];
    }

    public function getPays()
    {
        return ['France' => 'France', 'Belgique' => 'Belgique'];
    }

    // /**
    //  * @return Spectacle[] Returns an array of Spectacle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Spectacle
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
