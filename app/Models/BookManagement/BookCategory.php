<?php

namespace Inspirium\Models\BookManagement;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\Models\BookManagement\BookCategory
 *
 * @property int $id
 * @property string $name
 * @property string|null $designation
 * @property int|null $parent_id
 * @property string|null $coefficient
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\Models\BookManagement\BookCategory[] $children
 * @property-read mixed $groups
 * @property-read \Inspirium\Models\BookManagement\BookCategory|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookCategory whereCoefficient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookCategory whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\BookCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BookCategory extends Model {

    protected $table = 'book_categories';

    protected $fillable = ['name', 'description', 'level'];

    protected $appends = ['groups'];

    public function parent() {
        return $this->belongsTo('Inspirium\Models\BookManagement\BookCategory', 'parent_id');
    }

    public function children() {
        return $this->hasMany('Inspirium\Models\BookManagement\BookCategory', 'parent_id');
    }

    public function getGroupsAttribute() {
        return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
    }

	public function books() {
		$this->morphedByMany('Inspirium\Models\BookManagement\Book', 'connection', 'book_category_pivot', 'connection_id', 'book_category_id');
	}

	public function propositions() {
		$this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'book_category_pivot', 'connection_id', 'book_category_id');
	}

}
