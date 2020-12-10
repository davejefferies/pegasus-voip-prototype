<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\ConferenceRooms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConferenceRooms|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConferenceRooms|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConferenceRooms[]    findAll()
 * @method ConferenceRooms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConferenceRoomsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConferenceRooms::class);
    }

    // /**
    //  * @return ConferenceRooms[] Returns an array of ConferenceRooms objects
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
    public function findOneBySomeField($value): ?ConferenceRooms
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
