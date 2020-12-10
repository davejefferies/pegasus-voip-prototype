<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersWatchers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersWatchers|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersWatchers|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersWatchers[]    findAll()
 * @method KamUsersWatchers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersWatchersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersWatchers::class);
    }

    // /**
    //  * @return KamUsersWatchers[] Returns an array of KamUsersWatchers objects
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
    public function findOneBySomeField($value): ?KamUsersWatchers
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
