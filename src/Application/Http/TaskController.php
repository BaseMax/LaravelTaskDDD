<?php

namespace App\Application\Http;

use App\Application\Task\TaskCreator;
use App\Application\Task\TaskDeleter;
use App\Application\Task\TaskUpdater;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TaskController
{
    private TaskCreator $taskCreator;
    private TaskUpdater $taskUpdater;
    private TaskDeleter $taskDeleter;

    public function __construct(TaskCreator $taskCreator, TaskUpdater $taskUpdater, TaskDeleter $taskDeleter)
    {
        $this->taskCreator = $taskCreator;
        $this->taskUpdater = $taskUpdater;
        $this->taskDeleter = $taskDeleter;
    }

    public function create(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        // Validate the request data
        $requestData = new TaskCreateRequest($request->getParsedBody());
        $requestData->validate();

        // Create the task
        $task = $this->taskCreator->create($requestData->getTitle());

        // Return the response
        $response->getBody()->write(json_encode(['id' => $task->getId()->getValue()]));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }

    public function update(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // Validate the request data
        $requestData = new TaskUpdateRequest($request->getParsedBody());
        $requestData->validate();

        // Update the task
        $this->taskUpdater->update($args['id'], $requestData->getTitle());

        // Return the response
        return $response->withStatus(204);
    }

    public function delete(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // Delete the task
        $this->taskDeleter->delete($args['id']);

        // Return the response
        return $response->withStatus(204);
    }
}
