<?php

namespace Inspirium\Models\BookManagement;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\Models\BookManagement\SchoolType
 *
 * @property int $id
 * @property string $name
 * @property string $designation
 * @property int|null $order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolType whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolType whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolType extends Model {
    protected $table = 'school_types';

    protected $fillable = ['name', 'designation', 'order'];

	public function books() {
		return $this->morphedByMany('Inspirium\Models\BookManagement\Book', 'connection', 'school_type_pivot', 'school_type_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'school_type_pivot', 'school_type_id');
	}
}
