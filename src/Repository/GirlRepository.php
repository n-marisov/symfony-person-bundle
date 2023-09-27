<?php

namespace Maris\Symfony\Person\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Maris\Symfony\Person\Entity\Girl;
use Maris\Symfony\Person\Entity\Person;

/**
 * Репозиторий сущности персоны.
 * @extends ServiceEntityRepository<Girl>
 *
 * @method Girl|null find($id, $lockMode = null, $lockVersion = null)
 * @method Girl|null findOneBy(array $criteria, array $orderBy = null)
 * @method Girl[]    findAll()
 * @method Girl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GirlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct( $registry, Girl::class );
    }

    /***
     * Сохраняет сущность в базе данных.
     * @param Girl $user
     * @param bool $flush
     * @return void
     */
    public function save( Girl $user, bool $flush = false ):void
    {
        $this->getEntityManager()->persist( $user );
        if($flush)
            $this->getEntityManager()->flush();
    }

    /**
     * Удаляет сущность из базы данных
     * @param Girl $user
     * @param bool $flush
     * @return void
     */
    public function remove( Girl $user, bool $flush = false ):void
    {
        $this->getEntityManager()->remove( $user );
        if($flush)
            $this->getEntityManager()->flush();
    }

    //    /**
//     * @return TestEntity[] Returns an array of TestEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TestEntity
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}