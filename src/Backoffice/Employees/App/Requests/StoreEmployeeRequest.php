<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Employees\Domain\DataTransferObjects\EmployeeDto;

class StoreEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
        ];
    }

    public function toDto(): EmployeeDto
    {
        return new EmployeeDto(
            name: $this->input('name'),
            email: $this->input('email'),
        );
    }
}
