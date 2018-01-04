<?php

namespace Inspirium\Models\BookManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Inspirium\Models\BookManagement\Book
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $cover
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Models\BookManagement\Book onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Book whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Book whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Models\BookManagement\Book withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\Models\BookManagement\Book withoutTrashed()
 * @mixin \Eloquent
 */
class Book extends Model {
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'cover'];

    protected $dates = ['deleted_at'];

    protected $appends = ['link', 'formattedAuthors'];

    public function authors() {
	    return $this->morphToMany('Inspirium\Models\BookManagement\Author', 'connection', 'author_pivot', 'connection_id', 'author_id');
    }

	public function bookCategories() {
		return $this->morphToMany('Inspirium\Models\BookManagement\BookCategory', 'connection', 'book_category_pivot', 'connection_id', 'book_category_id');
	}

	public function bibliotecas() {
		return $this->morphToMany('Inspirium\Models\BookManagement\BookBiblioteca', 'connection', 'biblioteca_pivot', 'connection_id', 'biblioteca_id');
	}

	public function bookTypes() {
		return $this->morphToMany('Inspirium\Models\BookManagement\BookType', 'connection', 'book_type_pivot', 'connection_id', 'book_type_id');
	}

	public function schoolSubjects() {
		return $this->morphToMany('Inspirium\Models\BookManagement\SchoolSubject', 'connection', 'school_subjects_pivot', 'connection_id', 'school_subject_id');
	}

	public function schoolTypes() {
		return $this->morphToMany('Inspirium\Models\BookManagement\SchoolType', 'connection', 'school_type_pivot', 'connection_id', 'school_type_id');
	}

    public function getLinkAttribute() {
    	return url('/books/book/'.$this->id.'/show');
    }

    public function getFormattedAuthorsAttribute() {
    	$out = '';
    	foreach ($this->authors as $author) {
    		$out .= $author->name . ' ';
	    }
	    return $out;
    }
}
