<?php

namespace Inspirium\Http\Controllers\Api\HumanResources;

use Inspirium\Http\Controllers\Controller;

class NotificationController extends Controller {

    public function getNotifications() {
        $user = \Auth::user();
        $notifications = $user->notifications;
        return response()->json($notifications);
    }
}
