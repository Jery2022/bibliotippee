<?php

namespace App\Repository;

use App\Entity\PeriodeSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PeriodeSearch>
 *
 * @method PeriodeSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodeSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodeSearch[]    findAll()
 * @method PeriodeSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodeSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodeSearch::class);
    }

    //    /**
    //     * @return PeriodeSearch[] Returns an array of PeriodeSearch objects
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

    //    public function findOneBySomeField($value): ?PeriodeSearch
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
