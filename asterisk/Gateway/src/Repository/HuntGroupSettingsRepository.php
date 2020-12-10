<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\HuntGroupSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HuntGroupSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method HuntGroupSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method HuntGroupSettings[]    findAll()
 * @method HuntGroupSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HuntGroupSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HuntGroupSettings::class);
    }

    // /**
    //  * @return HuntGroupSettings[] Returns an array of HuntGroupSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HuntGroupSettings
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
