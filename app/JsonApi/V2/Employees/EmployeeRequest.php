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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'mobile' => ['nullable', 'string'],
            'mobile_pre' => ['nullable', 'string'],
            'mobile_vpn' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'phone_pre' => ['nullable', 'string'],
            'phone_vpn' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
            'sex' => ['nullable', 'string'],
            'room' => ['nullable', 'string'],
            'department' => JsonApiRule::toOne(),
            'roles' => JsonApiRule::toMany(),
        ];
    }

}
