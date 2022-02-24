<?php

namespace Inspirium\JsonApi\V2\Signatures;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class SignatureRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'workOrder' => JsonApiRule::toOne(),
            'employee' => JsonApiRule::toOne(),
            'signed' => ['nullable'],
            'order' => ['nullable', 'integer'],
        ];
    }

}
