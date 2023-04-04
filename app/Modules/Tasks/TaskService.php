<?php

namespace App\Modules\Tasks;

use App\Modules\Tasks\TaskServiceInterface;
use App\Modules\Tasks\TaskDTO;

class TaskService implements TaskServiceInterface
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks()
    {
        return $this->taskRepository->getAllTasks();
    }

    public function getTaskById(string $id)
    {
        return $this->taskRepository->getTaskById($id);
    }

    public function createTask(TaskDTO $taskDTO)
    {
        return $this->taskRepository->createTask($taskDTO);
    }

    public function updateTask(string $id, TaskDTO $taskDTO)
    {
        $task = $this->taskRepository->getTaskById($id);

        if (!$task) {
            return null;
        }

        $task->title = $taskDTO->title;

        $task->description = $taskDTO->description;

        return $this->taskRepository->saveTask($task);
    }

    public function deleteTask(string $id)
    {
        $task = $this->taskRepository->getTaskById($id);

        if (!$task) {
            return null;
        }

        $this->taskRepository->deleteTask($task);

        return $task;
    }
}
