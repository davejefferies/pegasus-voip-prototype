<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersPua;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersPua|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersPua|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersPua[]    findAll()
 * @method KamUsersPua[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersPuaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersPua::class);
    }

    // /**
    //  * @return KamUsersPua[] Returns an array of KamUsersPua objects
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
    public function findOneBySomeField($value): ?KamUsersPua
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
