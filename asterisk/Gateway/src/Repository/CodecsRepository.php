<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\Codecs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Codecs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Codecs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Codecs[]    findAll()
 * @method Codecs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodecsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Codecs::class);
    }

    // /**
    //  * @return Codecs[] Returns an array of Codecs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Codecs
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
