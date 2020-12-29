<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Pusher\Pusher;

class SendNotification extends Controller
{
    public function store(Request $request,$user_id)
    {
        $user = User::find($user_id); // id của user mình đã đăng kí ở trên, user này sẻ nhận được thông báo
        $data = $request->only([
            'title',
            'content',
        ]);
         $user->notify(new UserNotification($data));
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('NotificationEvent', 'send-message', $data);
        return response()->json([
            $data
        ]);
    }

}
