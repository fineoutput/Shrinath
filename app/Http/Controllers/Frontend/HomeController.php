<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Products;
use App\Models\Slider1;
use App\Models\Slider2;
use App\Models\Slider3;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Redirect;
use Laravel\Sanctum\PersonalAccessToken;
use DateTime;
use Razorpay\Api\Product;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    // ============================= START INDEX ============================ 
    public function index(Request $req)
    {
        $data['slider1'] = Slider1::where('status','1')->where('type','web')->orderBy('id','DESC')->get();
        $data['slider2'] = Slider2::where('status','1')->orderBy('id','DESC')->get();
        $data['slider3'] = Slider3::where('status','1')->orderBy('id','DESC')->get();
        $data['product'] = Products::where('status', 1)->orderBy('id', 'DESC')->get();
        $data['gallery'] = Gallery::where('status', 1)->orderBy('id', 'DESC')->get();
        $data['blogs'] = Block::orderBy('id', 'DESC')->get();
        return view('Frontend/index',$data)->withTitle('');
    }

    public function about(Request $req)
    {
     
        return view('Frontend/about')->withTitle('');
    }
    public function our_team(Request $req)
    {
     
        return view('Frontend/our_team')->withTitle('');
    }
    public function our_commitments(Request $req)
    {
     
        return view('Frontend/our_commitments')->withTitle('');
    }
    public function confidentiality_privacy(Request $req)
    {
     
        return view('Frontend/confidentiality_privacy')->withTitle('');
    }
    public function legal_information(Request $req)
    {
     
        return view('Frontend/legal_information')->withTitle('');
    }
    public function blog_single(Request $req, $encryptedId)
    {   

         $id = Crypt::decrypt($encryptedId);
        $data['blog'] = Block::findOrFail($id);
     
        return view('Frontend/blog_single',$data)->withTitle('');
    }

    public function our_products($category_id = null)
    {
         $data['category'] = Category::orderBy('id', 'DESC')->where('status', 1)->get();

        if (!$category_id && $data['category']->isNotEmpty()) {
            $category_id = $data['category']->first()->id;
        }

        $data['product'] = Products::where('status', 1)
                                ->where('category_id', $category_id)
                                ->orderBy('id', 'DESC')
                                ->paginate(6);

        $data['selected_category_id'] = $category_id;

        return view('Frontend.our_products', $data)->withTitle('');
    }


    public function prod_detail($product_id = null)
    {
          $data['product'] = Products::where('status', 1)
                                ->where('id', $product_id)
                                ->first();

          $data['related_product'] = Products::where('status', 1)
                                ->where('category_id',  $data['product']->category_id)->where('id', '!=', $product_id)
                                ->get();

        return view('Frontend/prod_detail',$data)->withTitle('');
    }


    public function our_gallery(Request $req)
    {

        $data['gallery'] = Gallery::where('status',1)->orderBy('id','DESC')->get();
        $data['GalleryCategory'] = GalleryCategory::where('status',1)->orderBy('id','DESC')->get();
     
        return view('Frontend/our_gallery',$data)->withTitle('');
    }


   public function blog(Request $req)
    {
        $allBlogs = Block::orderBy('id', 'DESC')->paginate(6);

        $blogChunks = $allBlogs->getCollection()->chunk(2);

        // Prepare individual blog groups
        $data['blog'] = $blogChunks->get(0) ?? collect(); // first 2
        $data['blog2'] = $blogChunks->get(1) ?? collect(); // next 2
        $data['blog3'] = $blogChunks->get(2) ?? collect(); // last 2

        // Pass full paginator for pagination links
        $data['paginator'] = $allBlogs;

        return view('Frontend.blog', $data)->withTitle('');
    }
   
    
}
