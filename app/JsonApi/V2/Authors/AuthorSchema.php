<?php

namespace Inspirium\JsonApi\V2\Authors;

use Inspirium\Models\BookManagement\Author;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Schema;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;

class AuthorSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Author::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('name'),
            Str::make('title'),
            Str::make('firstName'),
            Str::make('lastName'),
            Str::make('image'),
            Str::make('work'),
            Str::make('occupation'),
            BelongsToMany::make('books'),
            BelongsToMany::make('proposition'),
            HasMany::make('expenses'),
            DateTime::make('createdAt')->readOnly(),
            DateTime::make('updatedAt')->readOnly(),
            DateTime::make('deletedAt')->readOnly(),
            Str::make('note'),
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
