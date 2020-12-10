<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\Resellers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Resellers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resellers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resellers[]    findAll()
 * @method Resellers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResellersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resellers::class);
    }

    // /**
    //  * @return Resellers[] Returns an array of Resellers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Resellers
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
