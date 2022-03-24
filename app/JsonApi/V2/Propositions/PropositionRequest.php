<?php

namespace Inspirium\JsonApi\V2\Propositions;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class PropositionRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'projectName' => ['string'],
            'projectNumber' => ['string'],
            'additionalProjectNumber' => ['string'],
            'title' => ['string'],
            'isbn' => ['string'],
            'edition' => ['string'],
            'status' => ['string'],
            'concept' => ['string'],
            'manuscript' => ['string'],
            'dotation' => ['boolean'],
            'dotationOrigin' => ['string'],
            'dotationAmount' => ['string'],
            'schoolAssignment' => ['boolean'],
            'mainTarget' => ['string'],
            'possibleProducts' => ['array'],
            'schoolLevel' => ['array'],
            'additions' => ['array'],
            'circulations' => ['string'],
            'numberOfPages' => ['number'],
            'width' => ['string'],
            'height' => ['string'],
            'paperType' => ['string'],
            'additionalWork' => ['string'],
            'colors' => ['number'],
            'colorsFirstPage' => ['number'],
        ];
    }

}
