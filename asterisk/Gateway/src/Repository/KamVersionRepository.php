<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamVersion[]    findAll()
 * @method KamVersion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamVersion::class);
    }

    // /**
    //  * @return KamVersion[] Returns an array of KamVersion objects
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
    public function findOneBySomeField($value): ?KamVersion
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
