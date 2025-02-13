<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\Models\Task;

class GetTaskAction
{
    public function execute(int $id): Task
    {
        return Task::findOrFail($id);
    }
}
