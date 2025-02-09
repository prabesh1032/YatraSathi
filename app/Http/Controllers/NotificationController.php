<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Show all notifications for the admin
    public function showNotifications()
    {
        $notifications = Notification::where('is_read', false)->get(); // Get unread notifications
        return view('notification', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        // Only update the 'is_read' field to true
        $notification->update(['is_read' => true]);
        // Redirect back to the notifications page
        return redirect()->back();
    }
}
