<?php

namespace App\Repository;

use App\Entity\Hellow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hellow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hellow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hellow[]    findAll()
 * @method Hellow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HellowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hellow::class);
    }

    // /**
    //  * @return Hellow[] Returns an array of Hellow objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hellow
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
