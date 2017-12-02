<?php

namespace Inspirium\Http\Controllers\Api\HumanResources;

use Illuminate\Notifications\DatabaseNotification;
use Inspirium\Http\Controllers\Controller;

class NotificationController extends Controller {

    public function getNotifications() {
        $user = \Auth::user();
        $notifications = $user->unreadNotifications;
        return response()->json($notifications);
    }

    public function markAsRead(DatabaseNotification $notification) {
    	$notification->markAsRead();
    	return response()->json([]);
    }
}
