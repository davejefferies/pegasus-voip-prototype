<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\QueueMembers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QueueMembers|null find($id, $lockMode = null, $lockVersion = null)
 * @method QueueMembers|null findOneBy(array $criteria, array $orderBy = null)
 * @method QueueMembers[]    findAll()
 * @method QueueMembers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QueueMembersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QueueMembers::class);
    }

    // /**
    //  * @return QueueMembers[] Returns an array of QueueMembers objects
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
    public function findOneBySomeField($value): ?QueueMembers
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
