<?php

namespace App\Application\Http;

use App\Domain\Task\Entity\Task;
use App\Domain\Task\ValueObject\TaskDescription;
use App\Domain\Task\ValueObject\TaskTitle;

class TaskUpdateRequest
{
    private Task $task;
    private TaskTitle $title;
    private TaskDescription $description;

    public function __construct(Task $task, string $title, string $description)
    {
        $this->task = $task;
        $this->title = new TaskTitle($title);
        $this->description = new TaskDescription($description);
    }

    public function getTask(): Task
    {
        return $this->task;
    }

    public function getTitle(): TaskTitle
    {
        return $this->title;
    }

    public function getDescription(): TaskDescription
    {
        return $this->description;
    }
}
