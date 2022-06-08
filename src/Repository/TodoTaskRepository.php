<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TodoTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TodoTask>
 *
 * @method TodoTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method TodoTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method TodoTask[]    findAll()
 * @method TodoTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TodoTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TodoTask::class);
    }

    public function add(TodoTask $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TodoTask $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
