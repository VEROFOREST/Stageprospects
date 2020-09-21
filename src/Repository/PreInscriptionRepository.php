<?php

namespace App\Repository;

use App\Entity\PreInscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PreInscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreInscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreInscription[]    findAll()
 * @method PreInscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreInscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreInscription::class);
    }

    // /**
    //  * @return PreInscription[] Returns an array of PreInscription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PreInscription
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
