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

//     public function sendToAllUsers(array $notificationPayload, array $dataPayload = [])
//     {
//         $users = User::whereNotNull('fcm_token')
//                     ->whereNotNull('device_id')
//                     ->get();

//         if ($users->isEmpty()) {
//             Log::info('No users to notify.');
//             return;
//         }

//         foreach ($users as $user) {

//         $message = CloudMessage::withTarget('token', $user->fcm_token)
//             ->withNotification(Notification::create(
//                 $notificationPayload['title'],
//                 $notificationPayload['body'],
//                 $notificationPayload['image'] ?? null
//             ))
//             ->withData($dataPayload);

//         try {
//             $this->messaging->send($message);
//             Log::info("Notification sent to user ID: {$user->id}");

//         } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
//             // Token not found → remove token
//             $user->update(['fcm_token' => null]);
//             Log::warning("Invalid FCM token removed (NotFound) for user ID: {$user->id}");

//         // } catch (\Kreait\Firebase\Exception\Messaging\NotFoundDevice $e) {
//         //     // Device not registered → remove token
//         //     $user->update(['fcm_token' => null]);
//         //     Log::warning("Invalid FCM token removed (NotFoundDevice) for user ID: {$user->id}");

//         } catch (\Kreait\Firebase\Exception\Messaging\InvalidMessage $e) {
//             // Invalid message/token → remove token
//             $user->update(['fcm_token' => null]);
//             Log::warning("Invalid FCM token removed (InvalidMessage) for user ID: {$user->id}");

//         } catch (\Throwable $e) {
//             // Final fallback: check if error message contains "not known"
//             if (str_contains($e->getMessage(), 'not known to the Firebase project')) {
//                 $user->update(['fcm_token' => null]);
//                 Log::warning("Invalid FCM token removed (Unknown Token) for user ID: {$user->id}");
//             }

//             Log::error("Failed to send notification to user ID: {$user->id} → " . $e->getMessage());
//         }
//     }
// }


public function sendToAllUsers(array $notificationPayload, array $dataPayload = [])
{
    try {
        $topic = 'shreenath';

        $data = $dataPayload;
        $data['image'] = $notificationPayload['image'] ?? '';
        $data['Screen'] = $dataPayload['screen'] ?? 'ProductDetail';

        $message = CloudMessage::withTarget('topic', $topic)
            ->withNotification(
                Notification::create(
                    $notificationPayload['title'],
                    $notificationPayload['body']
                )
            )
            ->withData($data);

        if (!empty($notificationPayload['image'])) {
            $imageUrl = $notificationPayload['image'];

            $message = $message
                ->withAndroidConfig([
                    'notification' => [
                        'image' => $imageUrl,
                    ],
                ])
                ->withApnsConfig([
                    'payload' => [
                        'aps' => [
                            'mutable-content' => 1,
                        ],
                    ],
                    'fcm_options' => [
                        'image' => $imageUrl,
                    ],
                ]);
        }

        Log::info('Sending global topic notification:', [
            'topic' => $topic,
            'title' => $notificationPayload['title'],
            'body' => $notificationPayload['body'],
            'data' => $data
        ]);

        $response = $this->messaging->send($message);

        Log::info("FCM Response: ", [
            'message_id' => $response
        ]);
        

        return ['success' => true];

    } catch (\Throwable $e) {

        Log::error("Topic Notification Failed: " . $e->getMessage());

        return [
            'success' => false,
            'error' => $e->getMessage(),
        ];
    }
}


}
