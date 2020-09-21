<?php

namespace App\Repository;

use App\Entity\CategFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategFormation[]    findAll()
 * @method CategFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategFormation::class);
    }

    // /**
    //  * @return CategFormation[] Returns an array of CategFormation objects
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
    public function findOneBySomeField($value): ?CategFormation
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
