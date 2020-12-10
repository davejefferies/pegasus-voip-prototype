<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\RoutingPatterns;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RoutingPatterns|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoutingPatterns|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoutingPatterns[]    findAll()
 * @method RoutingPatterns[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoutingPatternsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoutingPatterns::class);
    }

    // /**
    //  * @return RoutingPatterns[] Returns an array of RoutingPatterns objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RoutingPatterns
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
