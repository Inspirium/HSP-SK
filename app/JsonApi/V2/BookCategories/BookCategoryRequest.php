<?php

namespace Inspirium\JsonApi\V2\BookCategories;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class BookCategoryRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'designation' => ['nullable', 'string'],
            'coefficient' => ['nullable', 'string'],
        ];
    }

}
