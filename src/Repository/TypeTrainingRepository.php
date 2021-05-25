<?php

namespace App\Repository;

use App\Entity\TypeTraining;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeTraining|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeTraining|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeTraining[]    findAll()
 * @method TypeTraining[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeTrainingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeTraining::class);
    }

    // /**
    //  * @return TypeTraining[] Returns an array of TypeTraining objects
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
    public function findOneBySomeField($value): ?TypeTraining
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
