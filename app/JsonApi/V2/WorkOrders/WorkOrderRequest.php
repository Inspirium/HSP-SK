<?php

namespace Inspirium\JsonApi\V2\WorkOrders;

use Illuminate\Validation\Rule;
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
            'edition' => ['required', 'string'],
            'project_number' => ['required', 'string'],
            'project_subnumber' => ['required', 'string'],
            'type' => ['required', 'string'],
            'status' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'deadline_at' => ['required', JsonApiRule::dateTime()],
            'proposition' => [JsonApiRule::toOne()],
            'signatures' => [JsonApiRule::toMany()],
            'assignee' => [JsonApiRule::toOne()],
            'assigner' => [JsonApiRule::toOne()],
            'documents' => [JsonApiRule::toMany()],
        ];
    }

}
