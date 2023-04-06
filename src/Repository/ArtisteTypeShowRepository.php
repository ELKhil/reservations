<?php

namespace App\Repository;

use App\Entity\ArtisteTypeShow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArtisteTypeShow>
 *
 * @method ArtisteTypeShow|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArtisteTypeShow|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArtisteTypeShow[]    findAll()
 * @method ArtisteTypeShow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtisteTypeShowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArtisteTypeShow::class);
    }

    public function save(ArtisteTypeShow $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ArtisteTypeShow $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ArtisteTypeShow[] Returns an array of ArtisteTypeShow objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArtisteTypeShow
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
