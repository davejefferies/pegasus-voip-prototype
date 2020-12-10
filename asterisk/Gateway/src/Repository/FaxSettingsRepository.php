<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\FaxSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FaxSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method FaxSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method FaxSettings[]    findAll()
 * @method FaxSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaxSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FaxSettings::class);
    }

    // /**
    //  * @return FaxSettings[] Returns an array of FaxSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FaxSettings
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
