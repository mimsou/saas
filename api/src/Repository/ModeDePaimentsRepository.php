<?php

namespace App\Repository;

use App\Entity\ModeDePaiments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModeDePaiments|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeDePaiments|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeDePaiments[]    findAll()
 * @method ModeDePaiments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeDePaimentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModeDePaiments::class);
    }

    // /**
    //  * @return ModeDePaiments[] Returns an array of ModeDePaiments objects
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
    public function findOneBySomeField($value): ?ModeDePaiments
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
