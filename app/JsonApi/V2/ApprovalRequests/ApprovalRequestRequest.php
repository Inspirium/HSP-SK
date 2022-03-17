<?php

namespace Inspirium\JsonApi\V2\ApprovalRequests;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class ApprovalRequestRequest extends ResourceRequest
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
            'description' => ['required', 'string'],
            'budget' => ['required', 'string'],
            'expense' => ['required', 'string'],
            'status' => ['required', 'string'],
        ];
    }

}
