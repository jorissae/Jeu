<?php

namespace App\Repository;

use App\Entity\PlayerOfPlay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PlayerOfPlay|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerOfPlay|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerOfPlay[]    findAll()
 * @method PlayerOfPlay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerOfPlayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerOfPlay::class);
    }

    // /**
    //  * @return PlayerOfPlay[] Returns an array of PlayerOfPlay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerOfPlay
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
