<?php

namespace App\Repository\ORM;

use App\Entity\ImageEntity;
use App\Repository\Interfaces\ImagePersistenceInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageEntity[]    findAll()
 * @method ImageEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRepository extends ServiceEntityRepository implements ImagePersistenceInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageEntity::class);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function persist(ImageEntity $entity): void
    {
        $this->getEntityManager()->persist($entity);
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}
