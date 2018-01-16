<?php
namespace Inspirium\Http\Controllers\Api\BookManagement;

use Illuminate\Http\Request;
use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\BookManagement\Book;

class BookController extends Controller {

	public function getBooks(Request $request) {
		$limit = $request->input('limit');
		$offset = $request->input('offset');
		$order = $request->input('order');
		$sort = $request->input('sort');
		$books = Book::orderBy($sort?$sort:'id', $order)
		             ->with('proposition.owner')
					 ->limit($limit)
					 ->offset($offset)
		             ->get();
		$total = Book::count();
		return response()->json(['rows' => $books, 'total' => $total]);
	}
}