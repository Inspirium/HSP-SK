<?php

namespace Inspirium\Http\Controllers;

use Illuminate\Http\Request;
use Inspirium\Models\BookManagement\Book;

class HomeController extends Controller
{
    public function getIndex() {
    	$editions = Book::with('authors')->limit(10)->orderBy('id','desc')->get();
    	return view(env('TEMPLATE') . '::home', ['editions' => $editions]);
    }

    public function getNotifications() {
        return view(env('TEMPLATE') . '::activity_stream', ['notifications' => \Auth::user()->notifications]);
	}
}
