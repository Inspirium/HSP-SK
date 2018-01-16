<?php

namespace Inspirium\Http\Controllers;

class MessageController extends Controller {

	public function showThread($id) {
		return view(config('app.template') . '::messages.thread');
	}
}