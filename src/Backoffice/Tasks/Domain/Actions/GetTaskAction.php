<?php

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class GetTaskAction
{
    public function execute(int $id)
    {
        return Task::findOrFail($id);
    }
}
