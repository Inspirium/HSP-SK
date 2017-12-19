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

    protected $appends = ['link'];

    public function authors() {
        $this->belongsToMany('Inspirium\Models\BookManagement\Author', 'author_book', 'book_id','author_id');
    }

    public function categories() {
        $this->belongsToMany('Inspirium\Models\BookManagement\BookCategory', 'book_category_pivot', 'book_id', 'category_id');
    }

    public function types() {
        $this->belongsToMany('Inspirium\Models\BookManagement\BookType', 'book_type_pivot', 'book_id', 'type_id');
    }

    public function schools() {
        $this->belongsToMany('Inspirium\Models\BookManagement\SchoolType', 'book_school_type_pivot', 'book_id', 'school_id');
    }

    public function subjects() {
        $this->belongsToMany('Inspirium\Models\BookManagement\SchoolSubject', 'book_school_subject_pivot', 'book_id', 'subject_id');
    }

    public function biblioteca() {
        $this->belongsTo('Inspirium\Models\BookManagement\BookBiblioteca');
    }

    public function getLinkAttribute() {
    	return url('/books/book/'.$this->id.'/show');
    }
}
