<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\KamUsersLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamUsersLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamUsersLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamUsersLocation[]    findAll()
 * @method KamUsersLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamUsersLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamUsersLocation::class);
    }

    public function getCount($id) {
        $items = $this->createQueryBuilder('a')
        ->andWhere('a.username = :ext')
        ->setParameter('ext', $id)
        ->getQuery()
        ->getResult();
        return count($items);
    }

    // /**
    //  * @return KamUsersLocation[] Returns an array of KamUsersLocation objects
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
    public function findOneBySomeField($value): ?KamUsersLocation
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
