<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Reservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

    // /**
    //  * @return Reservation[] Returns an array of Reservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getLastInserted($entity, $amount)
    {
        return $this->getEntityManager()
                    ->createQuery(
                        "SELECT e FROM $entity e ORDER BY e.id DESC"
                    )
                    ->setMaxResults($amount)
                    ->getResult();
    }
    
    public function getLastInsertedAjax($entity, $amount)
    {
        return $this->getEntityManager()
                    ->createQuery(
                        "SELECT e.id, e.lieu, e.image, e.adresse, e.ville, e.map, e.telephone, e.prix, e.description, e.capacite, e.created_at, u.username FROM $entity e JOIN e.user u ORDER BY e.id DESC"
                    )
                    ->setMaxResults($amount)
                    ->getResult();
    }
}
