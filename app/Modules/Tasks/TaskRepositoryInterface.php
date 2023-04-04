<?php

namespace App\Modules\Tasks;

use App\Modules\Tasks\TaskDTO;
use App\Modules\Tasks\Task;

interface TaskRepositoryInterface
{
    public function getAllTasks();

    public function getTaskById(string $id);

    public function createTask(TaskDTO $taskDTO);

    public function saveTask(Task $task);

    public function deleteTask(Task $task);
}
