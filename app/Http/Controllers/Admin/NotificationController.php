<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;

        $unreadOnly = true;
        $unreadOnly = $request->query('unreadOnly');

        $notifications = $unreadOnly
        ? auth()->user()->notifications
        : auth()->user()->unreadNotifications;

        auth()->user()->unreadNotifications->markAsRead();

        return view('admin.notifications.index', [
            'notifications' => $notifications,
            'unreadOnly' => $unreadOnly,
        ]);
        
    }
}
