<?php

namespace App\Modules\Tasks\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Tasks\TaskRepositoryInterface;
use App\Modules\Tasks\TaskServiceInterface;
use App\Modules\Tasks\TaskDTO;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaskRepositoryInterface $taskRepository)
    {
        $tasks = $taskRepository->getAllTasks();

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TaskServiceInterface $taskService)
    {
        $taskDTO = new TaskDTO(
            $request->input("title"),
            $request->input("description")
        );

        $task = $taskService->createTask($taskDTO);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, TaskRepositoryInterface $taskRepository)
    {
        $task = $taskRepository->getTaskById($id);

        if (!$task) {
            return response()->json([
                "message" => "Task Not Found."
            ], 404);
        }

        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, TaskServiceInterface $taskService)
    {
        $taskDTO = new TaskDTO(
            $request->input("title"),
            $request->input("description")
        );

        $task = $taskService->updateTask($id, $taskDTO);

        if (!$task) {
            return response()->json([
                "message" => "Task Not Found."
            ], 404);
        }

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, TaskServiceInterface $taskService)
    {
        $task = $taskService->deleteTask($id);

        if (!$task) {
            return response()->json([
                "message" => "Task Not Found."
            ], 404);
        }

        return response()->json([
            "message" => "Task Deleted.",
            "Task" => $task
        ]);
    }
}
