<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\App\Requests\StoreEmployeeRequest;
use Lightit\Backoffice\Employees\App\Transformers\EmployeeTransformer;
use Lightit\Backoffice\Employees\Domain\Actions\StoreEmployeeAction;

class StoreEmployeeController
{
    public function __invoke(StoreEmployeeRequest $request, StoreEmployeeAction $storeEmployeeAction): JsonResponse
    {
        $employee = $storeEmployeeAction->execute($request->toDto());

        return responder()
            ->success($employee, EmployeeTransformer::class)
            ->respond(
                $employee->wasRecentlyCreated
                    ? JsonResponse::HTTP_CREATED
                    : JsonResponse::HTTP_OK
            );
    }
}
