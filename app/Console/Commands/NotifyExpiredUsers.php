<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class NotifyExpiredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
     protected $signature = 'notify:expired-users';
    protected $description = 'Notify users whose trial period is over';

    // protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    

    public function handle()
    {
       $users = User::where('status', 4)
    ->where('entry_date', '<=', Carbon::now()->subDays(7)->toDateString())
    ->whereNotNull('fcm_token')
    ->whereNotNull('device_id')
    ->get();

        if ($users->isEmpty()) {
            $this->info('No expired users found today.');
            return;
        }

        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase/shreenath-fcdd8-firebase-adminsdk-fbsvc-9dec5c0930.json'));
        $messaging = $factory->createMessaging();

        foreach ($users as $user) {
            $message = CloudMessage::withTarget('token', $user->fcm_token)
                ->withNotification(Notification::create(
                    'Time Limit Over',
                    'Your time limit is up. Please register to use this app.'
                ));

            try {
                $messaging->send($message);
                $this->info("Notification sent to user ID: {$user->id}");
            } catch (\Throwable $e) {
                $this->error("Failed to send notification to user ID: {$user->id} → " . $e->getMessage());
            }
        }
    }

}
