<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogViewerController extends Controller
{
     public function index()
    {
        $logFile = storage_path('logs/laravel.log');

        if (!File::exists($logFile)) {
            return response('Log file not found.', 404);
        }

        $logs = File::get($logFile); // Get entire log file contents

        // Optional: Limit size (e.g. only last 5000 characters)
        $logs = substr($logs, -5000);

        return response()->view('logs.view', ['logs' => $logs]);
    }
}
