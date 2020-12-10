<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\ApplicationServers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationServers|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationServers|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationServers[]    findAll()
 * @method ApplicationServers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationServersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationServers::class);
    }

    // /**
    //  * @return ApplicationServers[] Returns an array of ApplicationServers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ApplicationServers
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
