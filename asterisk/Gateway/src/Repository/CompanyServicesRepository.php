<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\CompanyServices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyServices|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyServices|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyServices[]    findAll()
 * @method CompanyServices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyServices::class);
    }

    // /**
    //  * @return CompanyServices[] Returns an array of CompanyServices objects
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
    public function findOneBySomeField($value): ?CompanyServices
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
