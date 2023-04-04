<?php

namespace App\Modules\Tasks;

use App\Modules\Tasks\TaskDTO;

interface TaskServiceInterface
{
    public function getAllTasks();

    public function getTaskById(string $id);

    public function createTask(TaskDTO $taskDTO);

    public function updateTask(string $id, TaskDTO $taskDTO);

    public function deleteTask(string $id);
}
