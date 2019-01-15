<?php
namespace Inspirium\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    protected $fillable = ['name'];

    protected $appends = ['link', 'links'];

    public function employees() {
        return $this->hasMany('Inspirium\Models\HumanResources\Employee');
    }

	/*public function tasks() {
		return $this->belongsToMany('Inspirium\TaskManagement\Models\Task', 'department_task_pivot', 'department_id', 'task_id')->with('assigner')->withPivot('order')->orderBy('pivot_order');
	}*/

	public function tasks() {
	    return $this->hasMany('Inspirium\TaskManagement\Models\Task');
    }

	public function getLinkAttribute() {
    	return '/human_resources/department/'.$this->id . '/edit';
	}

	public function getLinksAttribute() {
		return [
			'edit' => [
				'method' => 'GET',
				'link' => '/human_resouces/department/'.$this->id.'/edit'
			],
			'delete' => [
				'method' => 'DELETE',
				'link' => '/api/human_resources/department/'.$this->id
			],
		];
	}
}

