<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersXcap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersXcap|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersXcap|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersXcap[]    findAll()
 * @method KamUsersXcap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersXcapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersXcap::class);
    }

    // /**
    //  * @return KamUsersXcap[] Returns an array of KamUsersXcap objects
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
    public function findOneBySomeField($value): ?KamUsersXcap
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
