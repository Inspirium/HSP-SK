<?php

namespace Inspirium\JsonApi\V2\WorkOrders;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Eloquent\Fields\ArrayHash;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class WorkOrderRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'projectNumber' => ['required', 'string'],
            'taskType' => ['required', 'string'],
            'status' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'taskContent' => ['nullable', 'array'],
            'comment' => ['nullable', 'string'],
            'deadlineAt' => ['required', JsonApiRule::dateTime()],
            'proposition' => [JsonApiRule::toOne()],
            'signatures' => [JsonApiRule::toMany()],
            'assignee' => [JsonApiRule::toOne()],
            'assigner' => [JsonApiRule::toOne()],
            'documents' => [JsonApiRule::toMany()],
        ];
    }

}
