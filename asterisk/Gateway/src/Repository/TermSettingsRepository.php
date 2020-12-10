<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\TermSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TermSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method TermSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method TermSettings[]    findAll()
 * @method TermSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TermSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TermSettings::class);
    }

    // /**
    //  * @return TermSettings[] Returns an array of TermSettings objects
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
    public function findOneBySomeField($value): ?TermSettings
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
