<?php

namespace Inspirium\JsonApi\V2\Employees;

use Inspirium\Models\HumanResources\Employee;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class EmployeeSchema extends Schema
{

    protected ?array $defaultPagination = ['number' => 1];

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Employee::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('name')->sortable()->readOnly(),
            Str::make('first_name')->sortable(),
            Str::make('last_name')->sortable(),
            Str::make('email')->sortable(),
            Str::make('mobile')->readOnly(),
            Str::make('phone')->readOnly(),
            Str::make('address'),
            Str::make('city'),
            Str::make('postal_code'),
            Str::make('room'),
            Str::make('sex'),
            Str::make('department_name')->readOnly(),
            DateTime::make('created_at')->sortable()->readOnly(),
            DateTime::make('updated_at')->sortable()->readOnly(),
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
