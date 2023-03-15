<?php

namespace App\Domain\Task\Entity;

use App\Domain\Task\ValueObject\TaskTitle;
use App\Domain\Task\Entity\TaskId;

class Task
{
    private TaskId $id;
    private TaskTitle $title;

    public function __construct(TaskId $id, TaskTitle $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function getId(): TaskId
    {
        return $this->id;
    }

    public function getTitle(): TaskTitle
    {
        return $this->title;
    }

    public function setTitle(TaskTitle $title): void
    {
        $this->title = $title;
    }
}
