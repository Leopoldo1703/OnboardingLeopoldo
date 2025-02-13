<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

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
            /** @var Task $task */
            $task = Task::findOrFail($data['id']);
            unset($data['id']);
            $oldEmployeeId = $task->employee_id;
            $task->update($data);
            $this->notifyEmployeeIfNeeded($task, $oldEmployeeId);
        } else {
            $task = new Task([
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => $data['status'],
                'employee_id' => $data['employee_id'],
            ]);
            $task->save();
            $this->notifyEmployeeIfNeeded($task);
        }

        return $task;
    }

    private function notifyEmployeeIfNeeded(Task $task, int|null $oldEmployeeId = null): void
    {
        if ($task->employee && ($oldEmployeeId === null || $oldEmployeeId != $task->employee_id)) {
            $task->employee->notify(new TaskAssignmentNotification($task));
        }
    }
}
