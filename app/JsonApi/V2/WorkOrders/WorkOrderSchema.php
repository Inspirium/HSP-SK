<?php

namespace Inspirium\JsonApi\V2\WorkOrders;

use Inspirium\JsonApi\Filters\SignaturesFilter;
use Inspirium\Models\WorkOrder;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\ArrayHash;
use LaravelJsonApi\Eloquent\Fields\ArrayList;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\Has;
use LaravelJsonApi\Eloquent\Filters\Where;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class WorkOrderSchema extends Schema
{

    protected ?array $defaultPagination = ['number' => 1];

    protected int $maxDepth = 3;

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = WorkOrder::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('title')->sortable(),
            Str::make('projectNumber'),
            Str::make('taskType', 'type')->sortable(),
            Str::make('status')->sortable(),
            Str::make('priority')->sortable(),
            Str::make('note'),
            ArrayHash::make('taskContent'),
            DateTime::make('finishedAt')->sortable()->readOnly(),
            DateTime::make('deadlineAt')->sortable(),
            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
            BelongsTo::make('proposition')->type('propositions'),
            BelongsToMany::make('signatures')->type('employees'),
            BelongsTo::make('assignee')->type('employees'),
            BelongsTo::make('assigner')->type('employees'),
            BelongsToMany::make('documents')->type('files'),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
            Where::make('task_type', 'type'),
            Where::make('status'),
            Where::make('assigner', 'assigner_id'),
            Where::make('assignee', 'assignee_id'),
            SignaturesFilter::make('signatures'),
        ];
    }

    /**
     * Get the resource paginator.
     *
     * @return Paginator|null
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }

}
