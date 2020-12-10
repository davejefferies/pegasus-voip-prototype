<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\TransformationRules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransformationRules|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransformationRules|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransformationRules[]    findAll()
 * @method TransformationRules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransformationRulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransformationRules::class);
    }

    // /**
    //  * @return TransformationRules[] Returns an array of TransformationRules objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TransformationRules
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
