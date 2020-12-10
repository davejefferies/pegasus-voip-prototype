<?php

namespace Pegasus\Gateway\Repository;

use Pegasus\Gateway\Entity\VoicemailSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VoicemailSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoicemailSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoicemailSettings[]    findAll()
 * @method VoicemailSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoicemailSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoicemailSettings::class);
    }

    // /**
    //  * @return VoicemailSettings[] Returns an array of VoicemailSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VoicemailSettings
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
