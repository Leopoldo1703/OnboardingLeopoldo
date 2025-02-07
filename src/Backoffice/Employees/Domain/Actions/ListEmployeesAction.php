<?php

namespace Lightit\Backoffice\Employees\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class ListEmployeesAction
{
    public function execute(): Collection
    {
        return Employee::all();
    }
}
