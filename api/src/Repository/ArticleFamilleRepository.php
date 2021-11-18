<?php

namespace App\Repository;

use App\Entity\ArticleFamille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleFamille|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleFamille|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleFamille[]    findAll()
 * @method ArticleFamille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleFamilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleFamille::class);
    }

    // /**
    //  * @return ArticleFamille[] Returns an array of ArticleFamille objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleFamille
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
