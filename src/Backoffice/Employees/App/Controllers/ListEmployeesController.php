<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lightit\Backoffice\Employees\App\Transformers\EmployeesTransformer;
use Lightit\Backoffice\Employees\Domain\Actions\ListEmployeesAction;

class ListEmployeesController
{
    public function __invoke(ListEmployeesAction $action): JsonResponse
    {
        $employees = $action->execute();

        return responder()
            ->success($employees, EmployeesTransformer::class)
            ->respond();
    }
}
