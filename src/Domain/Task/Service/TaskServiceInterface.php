<?php

namespace App\Domain\Task\Service;

use App\Domain\Task\Entity\Task;
use App\Domain\Task\Entity\TaskId;
use App\Domain\Task\ValueObject\TaskTitle;

interface TaskServiceInterface
{
    public function createTask(TaskTitle $title): Task;

    public function updateTask(TaskId $id, TaskTitle $title): void;

    public function deleteTask(TaskId $id): void;
}
