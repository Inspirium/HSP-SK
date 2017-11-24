<?php

namespace Inspirium\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex() {
    	return view(env('TEMPLATE') . '::home');
    }
}
