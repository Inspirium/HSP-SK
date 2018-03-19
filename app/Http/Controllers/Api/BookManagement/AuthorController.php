<?php

namespace Inspirium\Http\Controllers\Api\BookManagement;

use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Models\BookManagement\Author;

class AuthorController extends Controller {

    public function search($term) {
        $authors = Author::where('first_name', 'LIKE', '%'.$term.'%')->orWhere('last_name', 'LIKE', '%'.$term.'%')->get();
        return response()->json($authors);
    }

    public function postAuthor(Request $request) {
		$author = Author::create([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'work' => $request->input('work'),
			'occupation' => $request->input('occupation'),
			'title' => $request->input('title'),
			'note' => $request->input('note')
		]);

		return response()->json($author);
    }

    public function getAuthor(Author $author) {
    	return response()->json($author);
    }

    public function deleteAuthor(Author $author) {
	    try {
		    $this->authorize( 'delete', $author );
	    }
	    catch (AuthorizationException $e) {
		    return response()->json(['error' => 'unauthorized'], 403);
	    }

	    $author->delete();

	    return response()->json([]);

    }

	public function getAuthors(Request $request) {
		$limit = $request->input('limit');
		$offset = $request->input('offset');
		$order = $request->input('order');
		$sort = $request->input('sort');
		$filter = $request->input('filter');
		if ($filter) {
			$books = Author::orderBy( $sort ? $sort : 'id', $order )
			             ->where('first_name', 'LIKE', "%$filter%")
						 ->orWhere('last_name', 'LIKE', "%$filter%")
			             ->limit( $limit )
			             ->offset( $offset )
			             ->get();
			$total = Author::where('first_name', 'LIKE', "%$filter%")
			               ->orWhere('last_name', 'LIKE', "%$filter%")->count();
		}
		else {
			$books = Author::orderBy( $sort ? $sort : 'id', $order )
			             ->limit( $limit )
			             ->offset( $offset )
			             ->get();
			$total = Author::count();
		}

		return response()->json(['rows' => $books, 'total' => $total]);
	}

	public function getRelatedPropositions(Request $request, Author $author) {
		$limit = $request->input('limit');
		$offset = $request->input('offset');
		$order = $request->input('order');
		$sort = $request->input('sort');
		$filter = $request->input('filter');

		$author->load(['propositions' => function($query) use($limit, $offset, $order, $sort, $filter) {
			$query->orderBy( $sort ? $sort : 'id', $order )
			      ->limit( $limit )
			      ->offset( $offset );
		}]);

		return response()->json(['rows' => $author->propositions, 'total' => $author->propositions()->count()]);
	}
}
