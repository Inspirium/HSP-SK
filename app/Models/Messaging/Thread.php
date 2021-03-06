<?php

namespace Inspirium\Models\Messaging;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * Inspirium\Messaging\Models\Thread
 *
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $connection
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\Messaging\Models\Message[] $messages
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\HumanResources\Models\Employee[] $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Messaging\Models\Thread onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Messaging\Models\Thread withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Messaging\Models\Thread withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $connection_id
 * @property string|null $connection_type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereConnectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereConnectionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Messaging\Models\Thread whereUpdatedAt($value)
 */
class Thread extends Model {
	use SoftDeletes, Notifiable;

	protected $table = 'threads';

	protected $with = ['messages'];

	protected $fillable = ['title'];

	public function messages() {
		return $this->hasMany('Inspirium\Models\Messaging\Message');
	}

	public function connection() {
		return $this->morphTo();
	}

	public function users() {
		return $this->belongsToMany('Inspirium\Models\HumanResources\Employee', 'threads_employees', 'thread_id', 'employee_id');
	}

	public function triggerAssigned() {
		$this->fireModelEvent('assigned');
	}

	public function receivesBroadcastNotificationsOn()
	{
		return 'thread.'.$this->id;
	}

}