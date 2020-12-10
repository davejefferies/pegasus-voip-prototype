<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\QueueSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QueueSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method QueueSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method QueueSettings[]    findAll()
 * @method QueueSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QueueSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QueueSettings::class);
    }

    // /**
    //  * @return QueueSettings[] Returns an array of QueueSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QueueSettings
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
