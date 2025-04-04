<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\Extensions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Extensions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Extensions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Extensions[]    findAll()
 * @method Extensions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtensionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Extensions::class);
    }

    // /**
    //  * @return Extensions[] Returns an array of Extensions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Extensions
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
