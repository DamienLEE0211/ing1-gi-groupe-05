<?php

namespace App\Repository;

use App\Entity\ResourcesChallenge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResourcesChallenge>
 *
 * @method ResourcesChallenge|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResourcesChallenge|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResourcesChallenge[]    findAll()
 * @method ResourcesChallenge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResourcesChallengeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResourcesChallenge::class);
    }

    public function save(ResourcesChallenge $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResourcesChallenge $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ResourcesChallenge[] Returns an array of ResourcesChallenge objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ResourcesChallenge
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
