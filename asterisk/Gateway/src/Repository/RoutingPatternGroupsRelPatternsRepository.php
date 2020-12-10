<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\RoutingPatternGroupsRelPatterns;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RoutingPatternGroupsRelPatterns|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoutingPatternGroupsRelPatterns|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoutingPatternGroupsRelPatterns[]    findAll()
 * @method RoutingPatternGroupsRelPatterns[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoutingPatternGroupsRelPatternsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoutingPatternGroupsRelPatterns::class);
    }

    // /**
    //  * @return RoutingPatternGroupsRelPatterns[] Returns an array of RoutingPatternGroupsRelPatterns objects
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
    public function findOneBySomeField($value): ?RoutingPatternGroupsRelPatterns
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
