<?php

namespace App\Repository;

use App\Entity\PeriodSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PeriodSearch>
 *
 * @method PeriodSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodSearch[]    findAll()
 * @method PeriodSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodSearch::class);
    }

    //    /**
    //     * @return PeriodSearch[] Returns an array of PeriodSearch objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PeriodSearch
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
