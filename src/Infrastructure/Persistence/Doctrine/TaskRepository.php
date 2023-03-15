<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Task\Entity\Task;
use App\Domain\Task\Repository\TaskRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineTaskRepository extends ServiceEntityRepository implements TaskRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function add(Task $task): void
    {
        $this->_em->persist($task);
        $this->_em->flush();
    }

    public function update(Task $task): void
    {
        $this->_em->flush($task);
    }

    public function delete(Task $task): void
    {
        $this->_em->remove($task);
        $this->_em->flush();
    }

    public function findById(int $taskId): ?Task
    {
        return $this->find($taskId);
    }

    public function findAll(): array
    {
        return $this->findAll();
    }
}
