<?php

namespace App\Repository\ORM;

use App\Entity\PostEntity;
use App\Repository\Interfaces\PostPersistenceInterface;
use App\Repository\Interfaces\PostRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @method PostEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostEntity[]    findAll()
 * @method PostEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface, PostPersistenceInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostEntity::class);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function persist(PostEntity $entity): void
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

    public function list(): array
    {
        return $this->createQueryBuilder('e')
            ->join('e.image', 'image')
            ->orderBy('e.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
