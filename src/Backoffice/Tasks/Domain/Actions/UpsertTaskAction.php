<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Employees\App\Notifications\TaskAssignmentNotification;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpsertTaskAction
{
    /**
     * @param array<string, mixed> $data
     */
    public function execute(array $data): Task
    {
        if (isset($data['id'])) {
            $task = Task::find($data['id']);
            if ($task) {
                if ($task instanceof Collection) {
                    throw new \Exception('Expected a single Task instance, but found a collection.');
                }
                unset($data['id']);
                $oldEmployeeId = $task->employee_id;
                $task->update($data);
                if ($oldEmployeeId != $data['employee_id'] && $task->employee) {
                    $task->employee->notify(new TaskAssignmentNotification($task));
                }
            } else {
                throw new \Exception('Task not found');
            }
        } else {
            $task = new Task([
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => $data['status'],
                'employee_id' => $data['employee_id'],
            ]);
            $task->save();
            if ($task->employee) {
                $task->employee->notify(new TaskAssignmentNotification($task));
            }
        }

        return $task;
    }
}
