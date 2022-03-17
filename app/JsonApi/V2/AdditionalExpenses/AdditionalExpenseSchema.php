<?php

namespace Inspirium\JsonApi\V2\AdditionalExpenses;

use Inspirium\BookProposition\Models\AdditionalExpense;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\Relations\HasOne;
use LaravelJsonApi\Eloquent\Fields\Relations\MorphTo;

class AdditionalExpenseSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = AdditionalExpense::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('expense'),
            Str::make('amount'),
            Str::make('type'),
            MorphTo::make('connection'),
            BelongsTo::make('parent')->type('additional-expense'),
            HasOne::make('child')->type('additional-expense'),
            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
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
