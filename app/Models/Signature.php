<?php

namespace Inspirium\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Inspirium\Models\HumanResources\Employee;

class Signature extends Pivot
{
    use HasFactory;

    protected $table = 'work_order_signatures';

    protected $with = ['employee'];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function workOrder() {
        return $this->belongsTo(WorkOrder::class);
    }

    public function getPersonAttribute() {
        return $this->employee;
    }
}
