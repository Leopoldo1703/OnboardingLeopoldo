<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Requests\UpsertTaskRequest;
use Lightit\Backoffice\Tasks\App\Transformers\TasksTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\UpsertTaskAction;

class UpsertTaskController
{
    public function __invoke(UpsertTaskRequest $request, UpsertTaskAction $action): JsonResponse
    {
        $task = $action->execute($request->validated());

        return responder()
            ->success($task, TasksTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
