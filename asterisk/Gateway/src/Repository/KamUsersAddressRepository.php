<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersAddress[]    findAll()
 * @method KamUsersAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersAddress::class);
    }

    // /**
    //  * @return KamUsersAddress[] Returns an array of KamUsersAddress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KamUsersAddress
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
