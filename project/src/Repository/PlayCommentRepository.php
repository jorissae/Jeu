<?php

namespace App\Repository;

use App\Entity\PlayComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PlayComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayComment[]    findAll()
 * @method PlayComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayComment::class);
    }

    // /**
    //  * @return PlayComment[] Returns an array of PlayComment objects
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
    public function findOneBySomeField($value): ?PlayComment
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
