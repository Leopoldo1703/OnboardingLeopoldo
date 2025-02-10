<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['nullable', 'exists:tasks,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'string', 'in:pending,in_progress,completed'],
            'employee_id' => ['nullable', 'exists:employees,id'],
        ];
    }

    public function getAction(): mixed
    {
        return $this->input('action');
    }
}
