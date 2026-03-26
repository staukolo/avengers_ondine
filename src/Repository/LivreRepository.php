<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Livre>
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }

    //    /**
    //     * @return Livre[] Returns an array of Livre objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Livre
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

        public function findByPremierCaractreTitre(string $lettre): array
        {
            return $this->createQueryBuilder('l')
                ->andWhere('l.titre LIKE :lettre')
                ->setParameter('lettre', $lettre . '%')
                ->orderBy('l.titre', 'ASC')
                ->getQuery()
                ->getResult();
        }

        public function findAuteursNbLivresMin(int $nbMin): array
        {
            return $this->getEntityManager()
                ->createQuery(
                    'SELECT a, COUNT(l.id) as nbLivres
                    FROM App\Entity\Auteur a
                    JOIN a.livres l
                    GROUP BY a.id
                    HAVING COUNT(l.id) > :nbMin
                    ORDER BY nbLivres DESC'
                )
                ->setParameter('nbMin', $nbMin)
                ->getResult();
        }

        public function countLivres(): int
        {
            return $this->createQueryBuilder('l')
                ->select('COUNT(l.id)')
                ->getQuery()
                ->getSingleScalarResult();
        }
}
