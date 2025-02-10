<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Transformers\TasksTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\GetTaskAction;

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
