<?php

namespace Inspirium\JsonApi\V2\AuthorExpenses;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class AuthorExpenseRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'amount' => ['nullable', 'string'],
            'percentage' => ['nullable', 'string'],
            'accontation' => ['nullable', 'string'],
            'type' => ['nullable', 'string'],
        ];
    }

}
