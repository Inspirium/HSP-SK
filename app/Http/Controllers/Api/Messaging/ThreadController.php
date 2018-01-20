<?php
namespace Inspirium\Http\Controllers\Api\Messaging;

use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Models\Messaging\Message;
use Inspirium\Models\Messaging\Thread;
use Inspirium\Notifications\NewMessage;
use Inspirium\Notifications\NewThreadMessage;

class ThreadController extends Controller {

	public function getThread($id) {
		return response()->json(Thread::find($id));
	}

	public function postMessage(Request $request, $id) {
		$thread = Thread::find($id);
		if ($thread) {
			$message = Message::create(['message' => $request->input('message'), 'sender_id' => \Auth::id(), 'thread_id' => $thread->id]);
			foreach ($thread->users as $user) {
				if ($user->id !==\Auth::id()) {
					$user->notify(new NewMessage($message));
				}
			}
			$thread->notify(new NewThreadMessage($message));
			return response()->json([]);
		}
		return false;
	}
}