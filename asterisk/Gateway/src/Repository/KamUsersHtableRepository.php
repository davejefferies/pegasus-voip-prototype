<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersHtable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersHtable|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersHtable|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersHtable[]    findAll()
 * @method KamUsersHtable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersHtableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersHtable::class);
    }

    // /**
    //  * @return KamUsersHtable[] Returns an array of KamUsersHtable objects
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
    public function findOneBySomeField($value): ?KamUsersHtable
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
