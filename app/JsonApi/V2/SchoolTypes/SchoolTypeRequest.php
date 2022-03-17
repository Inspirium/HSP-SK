<?php

namespace Inspirium\JsonApi\V2\SchoolTypes;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class SchoolTypeRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['rerquired', 'string'],
            'designation' => ['rerquired', 'string'],
            'order' => ['nullable', 'int']
        ];
    }

}
