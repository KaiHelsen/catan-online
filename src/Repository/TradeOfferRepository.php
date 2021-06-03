<?php

namespace App\Repository;

use App\Entity\TradeOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TradeOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method TradeOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method TradeOffer[]    findAll()
 * @method TradeOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TradeOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TradeOffer::class);
    }

    // /**
    //  * @return TradeOffer[] Returns an array of TradeOffer objects
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
    public function findOneBySomeField($value): ?TradeOffer
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
