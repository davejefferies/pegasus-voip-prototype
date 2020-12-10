<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\TerminalManufacturers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TerminalManufacturers|null find($id, $lockMode = null, $lockVersion = null)
 * @method TerminalManufacturers|null findOneBy(array $criteria, array $orderBy = null)
 * @method TerminalManufacturers[]    findAll()
 * @method TerminalManufacturers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TerminalManufacturersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TerminalManufacturers::class);
    }

    // /**
    //  * @return TerminalManufacturers[] Returns an array of TerminalManufacturers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TerminalManufacturers
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
