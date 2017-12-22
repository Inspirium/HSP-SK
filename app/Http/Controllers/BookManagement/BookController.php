<?php

namespace Inspirium\Http\Controllers\BookManagement;

use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\BookManagement\Book;

class BookController extends Controller {

    public function showBooks() {
        $elements = Book::all();
        $columns = [
            'title' => [ 'title' => 'Name' ],
        ];
        $strings = [
            "title" => "Books",
            "add_new" => "Add New Book",
        ];
        $links = [
            'add_new' => url('book/edit'),
            'edit' => url('book/edit/'),
            'delete' => url('book/delete/'),
            'show' => url('book/show')
        ];
        return view(config('app.template') . '::vue.table-search', compact( 'elements', 'columns', 'strings', 'links' ));
    }

    public function showBook($id) {

    }

    public function editBook($id = null) {

    }
}
