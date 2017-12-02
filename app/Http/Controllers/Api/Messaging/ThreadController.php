<?php
namespace Inspirium\Http\Controllers\Api\Messaging;

use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Models\Messaging\Message;
use Inspirium\Models\Messaging\Thread;

class ThreadController extends Controller {

	public function getThread($id) {
		return response()->json(Thread::find($id));
	}

	public function postMessage(Request $request, $id) {
		$thread = Thread::find($id);
		if ($thread) {
			$thread->messages()->create(
				['message' => $request->input('message'), 'sender_id' => \Auth::id()]
			);
			$thread->load('messages');
			return response()->json($thread->messages);
		}
		return false;
	}
}