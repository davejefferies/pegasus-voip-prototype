<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\TerminalModels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TerminalModels|null find($id, $lockMode = null, $lockVersion = null)
 * @method TerminalModels|null findOneBy(array $criteria, array $orderBy = null)
 * @method TerminalModels[]    findAll()
 * @method TerminalModels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TerminalModelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TerminalModels::class);
    }

    // /**
    //  * @return TerminalModels[] Returns an array of TerminalModels objects
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
    public function findOneBySomeField($value): ?TerminalModels
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
