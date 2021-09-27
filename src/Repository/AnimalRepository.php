<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Animal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animal[]    findAll()
 * @method Animal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    // /**
    //  * @return Animal[] Returns an array of Animal objects
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
    public function findOneBySomeField($value): ?Animal
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getByRegime($regime = null)
    {
        $qb = $this->createQueryBuilder('a')
            ->join('a.regimeAlimentaire', 'r')
            ->andWhere('r.nom = :val')
            ->setParameter('val', $regime)
            ->orderBy('a.nom', 'ASC');

        $result = $qb->getQuery()->getResult();
        return $result;
    }

//    public function getPredateurs($animal)
//    {
//        $qb = $this->createQueryBuilder('a')
//            ->addSelect('a.predateurs')
//            ->join('a.predateurs', 'p')
//            ->andWhere('a.id = :id')
//            ->setParameter('id', $animal)
//            ->orderBy('a.nom', 'ASC');
//
//        $result = $qb->getQuery()->getResult();
//        return $result;
//    }
}
