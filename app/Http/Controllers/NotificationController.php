<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAllNotifications() {
        $currentUserId = auth()->user()->id;
        $notifications = Notification::where('user_id', $currentUserId)->with('sender')->orderBy('sent_at', 'DESC')->get();

        // $senders = $notifications->map(function ($notification) {
        //     return [
        //         'id' => $notification->sender->id,
        //         'name' => $notification->sender->name
        //     ];
        // });
        
        return view('notification', compact('notifications', /*'senders'*/));
    }
}
