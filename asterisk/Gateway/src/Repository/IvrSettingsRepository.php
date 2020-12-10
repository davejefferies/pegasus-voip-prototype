<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\IvrSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IvrSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method IvrSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method IvrSettings[]    findAll()
 * @method IvrSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IvrSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IvrSettings::class);
    }

    // /**
    //  * @return IvrSettings[] Returns an array of IvrSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IvrSettings
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
