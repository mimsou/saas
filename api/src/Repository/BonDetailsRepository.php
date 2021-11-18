<?php

namespace App\Repository;

use App\Entity\BonDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BonDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method BonDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method BonDetails[]    findAll()
 * @method BonDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BonDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BonDetails::class);
    }

    // /**
    //  * @return BonDetails[] Returns an array of BonDetails objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BonDetails
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
