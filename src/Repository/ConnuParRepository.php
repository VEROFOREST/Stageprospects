<?php

namespace App\Repository;

use App\Entity\ConnuPar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConnuPar|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConnuPar|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConnuPar[]    findAll()
 * @method ConnuPar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConnuParRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConnuPar::class);
    }

    // /**
    //  * @return ConnuPar[] Returns an array of ConnuPar objects
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
    public function findOneBySomeField($value): ?ConnuPar
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
