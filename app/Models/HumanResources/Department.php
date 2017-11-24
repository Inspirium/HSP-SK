<?php
namespace Inspirium\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\HumanResources\Models\Department
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\HumanResources\Models\Employee[] $employees
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\TaskManagement\Models\Task[] $tasks
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Department extends Model {

    protected $fillable = ['name'];

    public function employees() {
        return $this->hasMany('Inspirium\Models\HumanResources\Employee');
    }

	public function tasks() {
		return $this->belongsToMany('Inspirium\TaskManagement\Models\Task', 'department_task_pivot', 'department_id', 'task_id')->with('assigner')->withPivot('order')->orderBy('pivot_order');
	}
}

