<?php

namespace Inspirium\JsonApi\V2\WorkOrders;

use Inspirium\Models\WorkOrder;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\ArrayHash;
use LaravelJsonApi\Eloquent\Fields\ArrayList;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class WorkOrderSchema extends Schema
{

    protected ?array $defaultPagination = ['number' => 1];

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
            Str::make('project_number'),
            Str::make('task_type', 'type')->sortable(),
            Str::make('status')->sortable(),
            Str::make('priority')->sortable(),
            Str::make('note'),
            ArrayHash::make('task_content'),
            DateTime::make('finished_at')->sortable()->readOnly(),
            DateTime::make('deadline_at')->sortable(),
            DateTime::make('created_at')->sortable()->readOnly(),
            DateTime::make('updated_at')->sortable()->readOnly(),
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
