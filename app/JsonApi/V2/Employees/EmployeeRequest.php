<?php

namespace Inspirium\JsonApi\V2\Employees;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class EmployeeRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'email' => ['required', 'email'],
            'mobile' => ['nullable', 'string'],
            'mobilePre' => ['nullable', 'string'],
            'mobileVpn' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'phonePre' => ['nullable', 'string'],
            'phoneVpn' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'postalCode' => ['nullable', 'string'],
            'sex' => ['nullable', 'string'],
            'room' => ['nullable', 'string'],
            'department' => JsonApiRule::toOne(),
            'roles' => JsonApiRule::toMany(),
        ];
    }

}
