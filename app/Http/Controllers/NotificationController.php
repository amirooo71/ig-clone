<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {

        $notification = auth()->user()->notifications()->find($id);

        $notification->markAsRead();

        return redirect()->back();

    }
}
