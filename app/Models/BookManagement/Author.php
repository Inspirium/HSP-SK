<?php

namespace Inspirium\Models\BookManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Inspirium\Models\BookManagement\Author
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $image
 * @property string|null $title
 * @property string|null $work
 * @property string|null $occupation
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\BookProposition\Models\AuthorExpense[] $expenses
 * @property-read mixed $name
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Models\BookManagement\Author onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Author whereWork($value)
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Models\BookManagement\Author withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Models\BookManagement\Author withoutTrashed()
 * @mixin \Eloquent
 */
class Author extends Model {
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'image'];

    protected $dates = ['deleted_at'];

    protected $appends = ['name', 'links'];

	public function books() {
		return $this->morphedByMany('Inspirium\Models\BookManagement\Book', 'connection', 'author_pivot', 'author_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'author_pivot', 'author_id');
	}

	public function expenses() {
		return $this->hasMany('Inspirium\BookProposition\Models\AuthorExpense', 'author_id');
	}

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getImageAttribute() {
        return 'https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg';
    }

    public function getLinksAttribute() {
	    return [
		    'edit' => [
			    'method' => 'GET',
			    'link' => '/books/author/'.$this->id.'/edit'
		    ],
		    'delete' => [
			    'method' => 'DELETE',
			    'link' => '/api/author/'.$this->id
		    ],
	    ];
    }
}
