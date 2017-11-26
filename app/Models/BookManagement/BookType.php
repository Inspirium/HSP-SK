<?php

namespace Inspirium\Models\BookManagement;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\Models\BookManagement\BookType
 *
 * @property int $id
 * @property string $name
 * @property string|null $designation
 * @property int|null $parent_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\Models\BookManagement\BookType[] $children
 * @property-read mixed $groups
 * @property-read \Inspirium\Models\BookManagement\BookType|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookType whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookType whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BookType extends Model {

    protected $table = 'book_types';

    protected $fillable = ['name', 'designation'];

    protected $appends = ['groups'];

	public function books() {
		return $this->morphedByMany('Inspirium\Models\BookManagement\Book', 'connection', 'book_type_pivot', 'book_type_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'book_type_pivot', 'book_type_id');
	}

	public function parent() {
		return $this->belongsTo('Inspirium\Models\BookManagement\BookType');
	}

	public function children() {
		return $this->hasMany('Inspirium\Models\BookManagement\BookType', 'parent_id');
	}

	public function getGroupsAttribute() {
		return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
	}
}
