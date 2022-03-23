<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\Messages\MessageQuery;
use Inspirium\Models\Messaging\Message;
use Inspirium\Models\Messaging\Thread;
use Inspirium\Notifications\NewMessage;
use Inspirium\Notifications\NewThreadMessage;
use LaravelJsonApi\Core\Responses\DataResponse;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;

class ThreadController extends Controller
{

    use Actions\FetchMany;
    use Actions\FetchOne;
    use Actions\Store;
    use Actions\Update;
    use Actions\Destroy;
    use Actions\FetchRelated;
    use Actions\FetchRelationship;
    use Actions\UpdateRelationship;
    use Actions\AttachRelationship;
    use Actions\DetachRelationship;

    public function newMessage(Request $request, Thread $thread) {
        $message = Message::create([
            'message' => $request->input('message'),
            'sender_id' => \Auth::id(),
            'thread_id' => $thread->id,
        ]);

        foreach ($thread->users as $user) {
            if ($user->id !==\Auth::id()) {
                $user->notify(new NewMessage($message));
            }
        }
        $thread->notify(new NewThreadMessage($message));
        $query = new MessageQuery();
        return  DataResponse::make($message)
            ->withQueryParameters($query)
            ->didCreate();
    }

}
