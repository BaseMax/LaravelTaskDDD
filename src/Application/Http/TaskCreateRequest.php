<?php

namespace App\Application\Http;

use App\Domain\Task\ValueObject\TaskDescription;
use App\Domain\Task\ValueObject\TaskTitle;

class TaskCreateRequest
{
    private TaskTitle $title;
    private TaskDescription $description;

    public function __construct(string $title, string $description)
    {
        $this->title = new TaskTitle($title);
        $this->description = new TaskDescription($description);
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
