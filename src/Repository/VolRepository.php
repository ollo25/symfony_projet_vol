<?php

namespace App\Repository;

use App\Entity\Vol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vol>
 *
 * @method Vol|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vol|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vol[]    findAll()
 * @method Vol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vol::class);
    }

    // Exemple de méthode personnalisée :
    // public function findByVilleDepart(string $ville): array
    // {
    //     return $this->createQueryBuilder('v')
    //         ->andWhere('v.villeDepart = :val')
    //         ->setParameter('val', $ville)
    //         ->orderBy('v.dateDepart', 'ASC')
    //         ->getQuery()
    //         ->getResult();
    // }
}