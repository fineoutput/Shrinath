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
    public function out_products(Request $req)
    {
     
        return view('Frontend/out_products')->withTitle('');
    }
    public function prod_detail(Request $req)
    {
     
        return view('Frontend/prod_detail')->withTitle('');
    }
    public function our_gallery(Request $req)
    {
     
        return view('Frontend/our_gallery')->withTitle('');
    }
    public function blog(Request $req)
    {
     
        return view('Frontend/blog')->withTitle('');
    }
   
    
}
