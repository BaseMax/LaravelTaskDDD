<?php

namespace App\Modules\Tasks;

use App\Modules\Tasks\TaskDTO;
use App\Modules\Tasks\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function getTaskById(string $id)
    {
        return Task::find($id);
    }

    public function createTask(TaskDTO $taskDTO)
    {
        $task = new Task();

        $task->title = $taskDTO->getTitle();

        $task->description = $taskDTO->getDescription();

        $task->save();
    }

    public function saveTask(Task $task)
    {
        $task->save();

        return $task;
    }

    public function deleteTask(Task $task)
    {
        $task->delete();
    }
}
