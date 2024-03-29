<?php

namespace Inspirium\JsonApi\V2\PropositionNotes;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;
use LaravelJsonApi\Validation\Rules\HasOne;

class PropositionNoteRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'note' => 'required',
            'step' => 'required',
            'proposition' => JsonApiRule::toOne()
        ];
    }

}
