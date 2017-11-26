<?php

namespace Inspirium\Http\Controllers\BookManagement;

use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\BookManagement\Author;

class AuthorController extends Controller {

    public function showAuthors() {
        $elements = Author::all();
        $columns = [
            'first_name' => [ 'title' => 'First Name' ],
            'last_name' => [ 'title' => 'Last Name' ]
        ];
        $strings = [
            "title" => "Authors",
            "add_new" => "Add New Author",
        ];
        $links = [
            'add_new' => url('books/author/edit'),
            'edit' => url('books/author/:id/edit/'),
            'delete' => url('books/author/:id/delete/'),
            'show' => url('books/author/:id/show')
        ];
        return view(config('app.template') . '::vue.table-search', compact( 'elements', 'columns', 'strings', 'links' ));
    }

    public function showAuthor($id) {
    	$author = Author::firstOrFail($id);
		return view(config('app.template') . '::books.authors.show', ['author' => $author]);
    }

    public function editAuthor($id = null) {
		$author = Author::firstOrNew(['id' => $id]  );
		return view(config('app.template') . '::books.authors.edit', ['author' => $author]);
    }
}
