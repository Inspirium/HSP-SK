<?php

namespace Inspirium\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\UserManagement\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\UserManagement\Models\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\UserManagement\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\UserManagement\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\UserManagement\Models\Role whereName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\Models\HumanResources\Employee[] $employees
 */
class Role extends Model {

    public $timestamps = false;

    protected $fillable = ['name', 'description'];

    public function employees() {
        return $this->belongsToMany('Inspirium\Models\HumanResources\Employee', 'employee_roles');
    }
}
