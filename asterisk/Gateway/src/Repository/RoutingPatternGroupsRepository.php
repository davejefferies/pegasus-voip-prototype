<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\RoutingPatternGroups;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RoutingPatternGroups|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoutingPatternGroups|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoutingPatternGroups[]    findAll()
 * @method RoutingPatternGroups[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoutingPatternGroupsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoutingPatternGroups::class);
    }

    // /**
    //  * @return RoutingPatternGroups[] Returns an array of RoutingPatternGroups objects
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
    public function findOneBySomeField($value): ?RoutingPatternGroups
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
