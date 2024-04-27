<?php

namespace App\Repository;

use App\Entity\WordSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WordSearch>
 *
 * @method WordSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method WordSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method WordSearch[]    findAll()
 * @method WordSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WordSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WordSearch::class);
    }

    //    /**
    //     * @return WordSearch[] Returns an array of WordSearch objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('w.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?WordSearch
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
