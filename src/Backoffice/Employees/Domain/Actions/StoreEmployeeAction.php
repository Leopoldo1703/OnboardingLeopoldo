<?php

namespace Lightit\Backoffice\Employees\Domain\Actions;

use Lightit\Backoffice\Employees\App\Requests\StoreEmployeeRequest;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class StoreEmployeeAction
{
    public function execute(StoreEmployeeRequest $request): Employee
    {
        return Employee::create($request->validated());
    }
}
