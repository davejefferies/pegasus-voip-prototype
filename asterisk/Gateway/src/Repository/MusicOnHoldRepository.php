<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\MusicOnHold;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MusicOnHold|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusicOnHold|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusicOnHold[]    findAll()
 * @method MusicOnHold[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicOnHoldRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusicOnHold::class);
    }

    // /**
    //  * @return MusicOnHold[] Returns an array of MusicOnHold objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MusicOnHold
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
