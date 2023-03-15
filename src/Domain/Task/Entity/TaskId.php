<?php

namespace App\Domain\Task\Entity;

use Ramsey\Uuid\Uuid;

class TaskId
{
    private string $id;

    public function __construct(string $id = null)
    {
        $this->id = $id ?? Uuid::uuid4()->toString();
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
