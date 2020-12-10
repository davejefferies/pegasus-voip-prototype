<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\TransformationRuleSets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransformationRuleSets|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransformationRuleSets|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransformationRuleSets[]    findAll()
 * @method TransformationRuleSets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransformationRuleSetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransformationRuleSets::class);
    }

    // /**
    //  * @return TransformationRuleSets[] Returns an array of TransformationRuleSets objects
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
    public function findOneBySomeField($value): ?TransformationRuleSets
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
