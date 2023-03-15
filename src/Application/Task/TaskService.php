<?php

namespace App\Application\Task;

use App\Domain\Task\Entity\Task;
use App\Domain\Task\Entity\TaskId;
use App\Domain\Task\Entity\TaskTitle;
use App\Domain\Task\Repository\TaskRepositoryInterface;
use App\Domain\Task\Service\TaskServiceInterface;
use App\Domain\Task\TaskDomainException;

class TaskService implements TaskServiceInterface
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(TaskTitle $title): Task
    {
        $task = new Task(new TaskId(), $title);

        $this->taskRepository->add($task);

        return $task;
    }

    public function updateTask(TaskId $id, TaskTitle $title): void
    {
        $task = $this->taskRepository->getById($id);

        if (!$task) {
            throw new TaskDomainException('Task not found.');
        }

        $task->setTitle($title);

        $this->taskRepository->add($task);
    }

    public function deleteTask(TaskId $id): void
    {
        $task = $this->taskRepository->getById($id);

        if (!$task) {
            throw new TaskDomainException('Task not found.');
        }

        $this->taskRepository->remove($task);
    }
}
