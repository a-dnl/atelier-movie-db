<?php

namespace App\Repository;

use App\Entity\Casting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Casting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Casting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Casting[]    findAll()
 * @method Casting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CastingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Casting::class);
    }

    public function findByMovieDQL($movie){

         // pour faire un appel DQL je dois passer par l'entity manager
         $em = $this->getEntityManager();

         /*
          Je dois definir explicitement la joitnure vers personne  + rapatriement des info dans le select
          afin que doctrine ne declenche une requete car il n'a pas les information sous la main durant la boucle
         */
         // Attention: les requete se font entre entité et non en SQL direct. Mon casting attend un objet movie et non movie_id
         $query = $em->createQuery(
             'SELECT c, p
              FROM App\Entity\Casting AS c
              JOIN c.person p
              WHERE c.movie = :movie  '
         )->setParameter('movie', $movie);
 
         //Pour que ma requete construite soit executé par Doctrine "->execute()"
         return $query->execute();

    }

    public function findByMovieQueryBuilder($movie){

        $qb = $this->createQueryBuilder('c')
           ->join('c.person', 'p') //je rend explicite la jointure
           ->addSelect('p') //je rend explicite le retour des informations des personnes
           ->where('c.movie = :myMovie')
           ->setParameter('myMovie', $movie)
       ;
       
       //cast retour de requete
       return $qb->getQuery()->getArrayResult();
        
    }

    // /**
    //  * @return Casting[] Returns an array of Casting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Casting
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
