<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Employees\Domain\DataTransferObjects\EmployeeDto;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class StoreEmployeeRequest extends FormRequest
{
    public const NAME = 'name';

    public const EMAIL = 'email';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME => ['required'],
            self::EMAIL => ['required', 'email:strict', Rule::unique((new Employee())->getTable())],
        ];
    }

    public function toDto(): EmployeeDto
    {
        return new EmployeeDto(
            name: $this->string(self::NAME)->toString(),
            email: $this->string(self::EMAIL)->toString(),
        );
    }
}
