<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lightit\Backoffice\Tasks\Domain\Actions\GetTaskAction;
use Lightit\Backoffice\Tasks\App\Transformers\TasksTransformer;

class GetTaskController
{
    public function __invoke(int $id, GetTaskAction $action): JsonResponse
    {
        $task = $action->execute($id);

        return responder()
            ->success($task, TasksTransformer::class)
            ->respond();
    }
}
