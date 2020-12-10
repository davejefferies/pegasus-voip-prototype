<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamTrusted;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamTrusted|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamTrusted|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamTrusted[]    findAll()
 * @method KamTrusted[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamTrustedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamTrusted::class);
    }

    // /**
    //  * @return KamTrusted[] Returns an array of KamTrusted objects
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
    public function findOneBySomeField($value): ?KamTrusted
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
