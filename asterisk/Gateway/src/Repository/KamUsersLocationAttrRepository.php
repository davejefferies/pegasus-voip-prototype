<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersLocationAttrs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersLocationAttrs|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersLocationAttrs|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersLocationAttrs[]    findAll()
 * @method KamUsersLocationAttrs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersLocationAttrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersLocationAttrs::class);
    }

    // /**
    //  * @return KamUsersLocationAttrs[] Returns an array of KamUsersLocationAttrs objects
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
    public function findOneBySomeField($value): ?KamUsersLocationAttrs
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
