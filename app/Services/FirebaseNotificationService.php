<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class FirebaseNotificationService
{
    protected $messaging;

    public function __construct()
    {
        $firebase = (new Factory)->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')));
        $this->messaging = $firebase->createMessaging();
    }

    public function sendToAllUsers(array $notificationPayload, array $dataPayload = [])
{
    $users = User::whereNotNull('fcm_token')->whereNotNull('device_id')->get();

    if ($users->isEmpty()) {
        Log::info('No users to notify.');
        return;
    }

    foreach ($users as $user) {
        $message = CloudMessage::withTarget('token', $user->fcm_token)
            ->withNotification(Notification::create(
                $notificationPayload['title'],
                $notificationPayload['body'],
                $notificationPayload['image'] ?? null
            ))
            ->withData($dataPayload);

        try {
            $this->messaging->send($message);
            Log::info("Notification sent to user ID: {$user->id}");
        } catch (\Throwable $e) {
            Log::error("Failed to send notification to user ID: {$user->id} → " . $e->getMessage());

            // If token is invalid for your Firebase project, remove it
            if (str_contains($e->getMessage(), 'not known to the Firebase project')) {
                $user->update(['fcm_token' => null]);
                Log::info("Removed invalid FCM token for user ID: {$user->id}");
            }
        }
    }
  }
}
