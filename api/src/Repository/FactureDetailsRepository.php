<?php

namespace App\Repository;

use App\Entity\FactureDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FactureDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactureDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactureDetails[]    findAll()
 * @method FactureDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactureDetails::class);
    }

    // /**
    //  * @return FactureDetails[] Returns an array of FactureDetails objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FactureDetails
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
