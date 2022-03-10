<?php

namespace Inspirium\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Inspirium\BookProposition\Models\BookProposition;
use Inspirium\Models\HumanResources\Employee;
use Inspirium\Models\Messaging\Thread;

class WorkOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'project_number', 'type', 'status', 'priority', 'note', 'deadline_at', 'task_content', 'comment'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'finished_at',
        'deadline_at',
    ];

    protected $casts = [
        'task_content' => AsArrayObject::class,
    ];

    public function proposition() {
        return $this->belongsTo(BookProposition::class);
    }

    public function signatures() {
        return $this->hasMany(Signature::class);
    }

    public function assignee() {
		return $this->belongsTo('Inspirium\Models\HumanResources\Employee', 'assignee_id');
	}

	public function assigner() {
		return $this->belongsTo('Inspirium\Models\HumanResources\Employee', 'assigner_id');
	}

    public function documents() {
		return $this->belongsToMany('Inspirium\Models\FileManagement\File', 'work_order_files', 'work_order_id', 'files_id')->withPivotValue('is_final', false);
	}

    public function finalDocuments() {
        return $this->belongsToMany('Inspirium\Models\FileManagement\File', 'work_order_files', 'work_order_id', 'files_id')->withPivotValue('is_final', true);
    }

    public function thread() {
        return $this->morphOne(Thread::class, 'connection');
    }
}
