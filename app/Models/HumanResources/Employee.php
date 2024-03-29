<?php

namespace Inspirium\Models\HumanResources;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Inspirium\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class Employee extends Authenticatable {

	use Notifiable, HasApiTokens, SoftDeletes;

    protected $guarded = [ 'created_at', 'update_at', 'deleted_at' ];
    protected $appends = [ 'name', 'department_name', 'phone_merged', 'mobile_merged', 'link', 'links' ];

	protected $hidden = [ 'password', 'remember_token' ];

	protected $casts = [
	    'notification_settings' => 'json'
    ];

    protected $dates = ['deleted_at'];

    public static function resolveId()
	{
		return \Auth::check() ? \Auth::user()->getAuthIdentifier() : null;
	}

    public function department() {
        return $this->belongsTo('Inspirium\Models\HumanResources\Department');
    }

	public function roles() {
		return $this->belongsToMany('Inspirium\Models\HumanResources\Role', 'employees_roles');
	}

	public function threads() {
		return $this->belongsToMany('Inspirium\Models\Messaging\Thread', 'threads_employees', 'employee_id', 'thread_id');
	}

	public function tasks() {
    	return $this->hasMany('Inspirium\TaskManagement\Models\Task', 'assignee_id');
	}

	public function taskCount()
	{
		return $this->hasOne('Inspirium\TaskManagement\Models\Task', 'assignee_id')
		            ->selectRaw('assignee_id, count(*) as aggregate')
		            ->groupBy('assignee_id');
	}

	public function getTaskCountAttribute()
	{
		// if relation is not loaded already, let's do it first
		if ( ! array_key_exists('taskCount', $this->relations))
			$this->load('taskCount');

		$related = $this->getRelation('taskCount');

		// then return the count directly
		return ($related) ? (int) $related->aggregate : 0;
	}

	public function hasRole($check) {
		return in_array($check, Arr::pluck($this->roles->toArray(), 'name'));
	}

    public function getDepartmentNameAttribute() {
    	if ($this->department) {
		    return $this->department->name;
	    }
	    return '';
    }

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getImageAttribute($value) {
    	if ($value) {
		    return 'http://cup.skolskaknjiga.hr:8080/imagecache/avatar/'.$value;
	    }
	    if ($this->email) {
		    return 'https://www.gravatar.com/avatar/' . md5( $this->email ) . '?s=50&d=mm';
	    }
	    return 'https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg';
    }

    public function getLinkAttribute() {
    	return '/human_resources/employee/'.$this->id.'/show';
    }

    public function getLinksAttribute() {
		return [
			'edit' => [
				'method' => 'GET',
				'link' => '/human_resouces/employee/'.$this->id.'/edit'
			],
			'delete' => [
				'method' => 'DELETE',
				'link' => '/api/human_resources/employee/'.$this->id
			],
		];
    }

	public function receivesBroadcastNotificationsOn()
	{
		return 'users.'.$this->id;
	}

	public function getPhoneMergedAttribute() {
    	return $this->phone_pre . ' ' . $this->phone;
	}

	public function getMobileMergedAttribute() {
		return $this->mobile_pre . ' ' . $this->mobile;
	}

	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPassword($token));
	}

    public function password(): Attribute {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Hash::make($value),
        );
    }

    public static function resolve()
    {
        return Auth::check() ? self::id : null;
    }
}
