<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    public function findAllOrderedByNameDQL(){

        // pour faire un appel DQL je dois passer par l'entity manager
        $em = $this->getEntityManager();

        // j'utilise la fonction create query
        $query = $em->createQuery(
            'SELECT movieNova
             FROM App\Entity\Movie AS movieNova
             ORDER BY movieNova.title ASC'
        );

        //Pour que ma requete construite soit executé par Doctrine "->execute()"
        return $query->execute();
        
    }

    public function findAllOrderedByNameQueryBuilder(){
        
        //pour faire un appel au query builder il faut utiliser la methode createQueryBuilder()
        // qui va declarer l'alias de la l'entité courante sur laquelle je suis deja positionnée dans mon constructeur
        $qb = $this->createQueryBuilder('m') //je suis deja sur movie
        ->orderBy('m.title', 'ASC')
        ->getQuery();// a ne pas oublier pour executer la requete

        return $qb->execute();
    }

    // /**
    //  * @return Movie[] Returns an array of Movie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Movie
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
