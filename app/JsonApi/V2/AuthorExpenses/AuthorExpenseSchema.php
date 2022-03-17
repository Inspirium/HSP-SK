<?php

namespace Inspirium\JsonApi\V2\AuthorExpenses;

use Inspirium\BookProposition\Models\AuthorExpense;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class AuthorExpenseSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = AuthorExpense::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('amount'),
            Str::make('percentage'),
            Str::make('accontation'),
            Str::make('type'),
            BelongsTo::make('author'),
            BelongsTo::make('proposition'),
            BelongsTo::make('parent')->type('author-expense'),
            BelongsToMany::make('additionalExpenses'),
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
