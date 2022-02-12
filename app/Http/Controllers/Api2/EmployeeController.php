<?php

namespace Inspirium\Http\Controllers\Api2;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Client\Request;
use Inspirium\Http\Resources\EmployeeCollection;
use Inspirium\Http\Resources\EmployeeResource;
use Inspirium\Models\HumanResources\Employee;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class EmployeeController extends \Inspirium\Http\Controllers\Controller
{
    public function index() {
        $employees = QueryBuilder::for(Employee::class)
            ->allowedFilters([
                AllowedFilter::callback('term', function(Builder $builder, $value) {
                    $builder->where('first_name','LIKE', "%$value%")
                        ->orWhere('last_name', 'LIKE', "%$value%")
                        ->orWhere('email', 'LIKE', "%$value%");
                }),
                'first_name', 'last_name', 'email'
            ])
            ->paginate(request()->input('page.size'))
            ->appends(request()->query());
        // return response()->json($employees);
        return EmployeeResource::collection($employees);
    }
}