<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersPresentity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersPresentity|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersPresentity|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersPresentity[]    findAll()
 * @method KamUsersPresentity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersPresentityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersPresentity::class);
    }

    // /**
    //  * @return KamUsersPresentity[] Returns an array of KamUsersPresentity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KamUsersPresentity
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
