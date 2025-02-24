<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskAssignmentNotification extends Notification
{
    use Queueable;

    public function __construct(protected Task $task)
    {
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(Employee $notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject(
                'Task has been assigned to you | ' . ($this->task->updated_at ? $this->task->updated_at->format(
                    'd/m/Y'
                ) : 'N/A')
            )
            ->markdown('mail.assigned-task', [
                'task' => $this->task,
            ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'task_title' => $this->task->title,
            'assigned_to' => $this->task->employee ? $this->task->employee->name : null,
        ];
    }
}
