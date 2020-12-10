<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\BitCallers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BitCallers|null find($id, $lockMode = null, $lockVersion = null)
 * @method BitCallers|null findOneBy(array $criteria, array $orderBy = null)
 * @method BitCallers[]    findAll()
 * @method BitCallers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BitCallersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BitCallers::class);
    }

    // /**
    //  * @return BitCallers[] Returns an array of BitCallers objects
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
    public function findOneBySomeField($value): ?BitCallers
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
