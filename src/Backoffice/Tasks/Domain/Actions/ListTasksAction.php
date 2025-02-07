<?php

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class ListTasksAction
{
    public function execute(): Collection
    {
        return Task::with('employee')->get();
    }
}
