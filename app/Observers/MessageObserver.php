<?php

namespace Inspirium\Observers;

use Inspirium\Models\Messaging\Message;
use Inspirium\Notifications\NewMessage;

class MessageObserver {

	public function created(Message $message) {
		foreach($message->thread->users as $user) {
			if ($message->sender->id !== $user->id){
				$user->notify(new NewMessage($message));
			}
		}
	}
}