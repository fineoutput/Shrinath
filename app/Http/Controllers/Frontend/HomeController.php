<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use Laravel\Sanctum\PersonalAccessToken;
use DateTime;


class HomeController extends Controller
{
    // ============================= START INDEX ============================ 
    public function index(Request $req)
    {
     
        return view('Frontend/index')->withTitle('');
    }
    public function about(Request $req)
    {
     
        return view('Frontend/about')->withTitle('');
    }
    public function our_team(Request $req)
    {
     
        return view('Frontend/our_team')->withTitle('');
    }
    
}
