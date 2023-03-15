<?php

namespace App\Application\Http;

use App\Domain\Task\Entity\Task;

class TaskDeleteRequest
{
    private Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getTask(): Task
    {
        return $this->task;
    }
}
