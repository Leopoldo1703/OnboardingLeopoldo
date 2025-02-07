<?php

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpsertTaskAction
{
    public function execute(array $data): Task
    {
        \Log::debug('UpsertTaskAction', $data);
        if (isset($data['id'])) {
            $task = Task::find($data['id']);
            if ($task) {
                unset($data["id"]);
                $task->update($data);
            } else {
                throw new \Exception('Task not found');
            }
        } else {
            $task = Task::create($data);
        }

        return $task;
    }

}
