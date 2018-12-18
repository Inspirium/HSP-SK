<?php

namespace Inspirium\Models\BookManagement;

use Illuminate\Database\Eloquent\Model;

class BookTender extends Model
{

    protected $guarded = [];

    public function books() {
        return $this->morphedByMany('Inspirium\Models\BookManagement\Book', 'connection', 'book_tender_pivot', 'book_tender_id');
    }

    public function propositions() {
        return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'book_tender_pivot', 'book_tender_id');
    }
}
