<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\MediaRelaySets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaRelaySets|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaRelaySets|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaRelaySets[]    findAll()
 * @method MediaRelaySets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaRelaySetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaRelaySets::class);
    }

    // /**
    //  * @return MediaRelaySets[] Returns an array of MediaRelaySets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MediaRelaySets
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
