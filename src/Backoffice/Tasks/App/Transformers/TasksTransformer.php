<?php

namespace Lightit\Backoffice\Tasks\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TasksTransformer extends Transformer
{
    public function transform(Task $task): array
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
            'assigned_user' => [
                'id' => $task->employee->id,
                'name' => $task->employee->name,
            ],
        ];
    }
}
