<?php

namespace Inspirium\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\UserResolver;


/**
 * Inspirium\HumanResources\Models\Employee
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property int|null $user_id
 * @property int|null $department_id
 * @property string|null $image
 * @property string|null $mobile_pre
 * @property string|null $mobile
 * @property string|null $mobile_vpn
 * @property string|null $phone_pre
 * @property string|null $phone
 * @property string|null $phone_vpn
 * @property string|null $address
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $room
 * @property string|null $sex
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Inspirium\HumanResources\Models\Department|null $department
 * @property-read mixed $department_name
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\TaskManagement\Models\Task[] $tasks
 * @property-read \Inspirium\UserManagement\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereMobilePre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereMobileVpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee wherePhonePre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee wherePhoneVpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\HumanResources\Models\Employee whereUserId($value)
 * @mixin \Eloquent
 * @property-read mixed $link
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\Messaging\Models\Thread[] $threads
 * @property string|null $password
 * @property string|null $remember_token
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read mixed $task_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\Models\HumanResources\Role[] $roles
 * @property-read \Inspirium\TaskManagement\Models\Task $taskCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\HumanResources\Employee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\HumanResources\Employee whereRememberToken($value)
 */
class Employee extends Authenticatable implements Auditable, UserResolver{

	use Notifiable, HasApiTokens, \OwenIt\Auditing\Auditable;

    protected $guarded = [ 'created_at', 'update_at', 'deleted_at' ];
    protected $appends = [ 'name', 'department_name', 'phone_merged', 'mobile_merged', 'link' ];

	protected $hidden = [ 'password', 'remember_token' ];

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
		return in_array($check, array_pluck($this->roles->toArray(), 'name'));
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
		    return Storage::disk('public')->url($value);
	    }
	    if ($this->email) {
		    return 'https://www.gravatar.com/avatar/' . md5( $this->email ) . '?s=50&d=mm';
	    }
	    return 'https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg';
    }

    public function getLinkAttribute() {
    	return '/human_resources/employee/'.$this->id.'/show';
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
}
