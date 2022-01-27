<?php

namespace Inspirium\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Inspirium\BookProposition\Models\BookProposition;
use Inspirium\Models\HumanResources\Employee;

class WorkOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'finished_at',
        'deadline',
    ];

    protected $with = ['proposition', 'signatures', 'assignee', 'assigner', 'documents'];

    protected $casts = [
        'task_content' => 'json'
    ]

    public function proposition() {
        return $this->belongsTo(BookProposition::class);
    }

    public function signatures() {
        return $this->belongsToMany(Employee::class, 'work_order_signatures', 'work_order_id', 'employee_id')->withPivot(['signed', 'signed_at']);
    }

    public function assignee() {
		return $this->belongsTo('Inspirium\Models\HumanResources\Employee', 'assignee_id');
	}

	public function assigner() {
		return $this->belongsTo('Inspirium\Models\HumanResources\Employee', 'assigner_id');
	}

    public function documents() {
		return $this->belongsToMany('Inspirium\Models\FileManagement\File', 'work_order_documents', 'work_order_id', 'file_id');
	}
}
