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
        $model = $this->model();
        $rules = [
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
            'password' => [
                $model ? 'filled' : 'required',
                'string',
                'min:8'
            ],
            'passwordConfirmation' => "required_with:password|same:password"
        ];

        // when creating, we do expect the password confirmation to always exist
        if (!$model) {
            $rules['passwordConfirmation'] = 'required_with:password|same:password';
        }

        return $rules;
    }

    public function withValidator($validator)
    {
        if ($this->isUpdating()) {
            $validator->sometimes(
                'passwordConfirmation',
                'required_with:password|same:password',
                fn($input) => isset($input['password']),
            );
        }
    }

}
