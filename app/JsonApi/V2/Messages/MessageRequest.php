<?php

namespace Inspirium\JsonApi\V2\Messages;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class MessageRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'message' => ['string'],
            'sender' => JsonApiRule::toOne(),
            'thread' => JsonApiRule::toOne(),
        ];
    }

}
