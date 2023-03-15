<?php

namespace App\Domain\Task\ValueObject;

use InvalidArgumentException;

class TaskTitle
{
    private string $title;

    public function __construct(string $title)
    {
        $this->setTitle($title);
    }

    public function __toString(): string
    {
        return $this->title;
    }

    private function setTitle(string $title): void
    {
        if (empty($title)) {
            throw new InvalidArgumentException('Task title cannot be empty.');
        }

        $this->title = $title;
    }
}
