<?php

namespace Inspirium\JsonApi\V2\Authors;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class AuthorRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {

        $model = $this->model();
        $rules = [
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'title' => ['required', 'string'],
            'work' => ['required', 'string']
        ];


        return $rules;


    }

}
