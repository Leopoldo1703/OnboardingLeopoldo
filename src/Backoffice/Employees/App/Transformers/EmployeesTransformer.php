<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class EmployeesTransformer extends Transformer
{
    public function transform(Employee $employee): array
    {
        return [
            'id' => $employee->id,
            'name' => $employee->name,
            'email' => $employee->email,
        ];
    }
}
