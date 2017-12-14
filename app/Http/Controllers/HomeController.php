<?php

namespace Inspirium\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex() {
    	return view(env('TEMPLATE') . '::home');
    }

    public function getNotifications() {
        return view(env('TEMPLATE') . '::activity_stream', ['notifications' => \Auth::user()->notifications]);
	}
}
