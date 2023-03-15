<?php

namespace App\Domain\Task\Repository;

use App\Domain\Task\Entity\Task;
use App\Domain\Task\Entity\TaskId;

interface TaskRepositoryInterface
{
    public function getById(TaskId $id): ?Task;

    public function add(Task $task): void;

    public function remove(Task $task): void;
}
