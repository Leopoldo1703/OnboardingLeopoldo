<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lightit\Backoffice\Tasks\App\Transformers\TasksTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\ListTasksAction;

class ListTasksController
{
    public function __invoke(ListTasksAction $action): JsonResponse
    {
        $tasks = $action->execute();

        return responder()
            ->success($tasks, TasksTransformer::class)
            ->respond();
    }
}
