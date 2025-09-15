<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Category;
use App\Models\Notifications;
use App\Models\Products;
use App\Models\State;

use App\Services\FirebaseService;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use App\Services\FirebaseNotificationService;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        
        if($user->power != 1){

            $productIds = explode(',', $user->product_id);
            $products = Products::whereIn('id',$productIds)->orderBy('id','DESC')->get();

        }else{
            $products = Products::orderBy('id','DESC')->get();
        }
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $data['category'] = Category::where('status',1)->get();
        return view('admin.products.create',$data);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'price' => 'required',
            'mrp' => 'required',
            'weight' => 'required',
            'image_1' => 'nullable',
            'image_2' => 'nullable',
            'image_3' => 'nullable',
            'image_4' => 'nullable',
        ]);

        $product = new Products;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->weight = $request->weight;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->status = 1;
        $product->auth_id = Auth::id();

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $imageName = time() . '_' . $imageField . '.' . $request->file($imageField)->extension();
                $request->file($imageField)->move(public_path('uploads/products'), $imageName);
                $product->$imageField = 'uploads/products/' . $imageName;
            }
        }

        if ($request->hasFile('video')) {
            $videoName = time() . '_video.' . $request->file('video')->extension();
            $request->file('video')->move(public_path('uploads/videos'), $videoName);
            $product->video = 'uploads/videos/' . $videoName;
        }

        $product->save();

        $notificationPayload = [
            'title' => 'New Product: ' . $product->name,
            'body' => 'Check out our new product: ' . $product->name,
            'image' => asset($product->image_1),
        ];

        $dataPayload = [
            'product_id' => $product->id,
            'category_id' => $product->category_id,
            'screen' => 'ProductDetail',
        ];

        $firebaseService = new FirebaseNotificationService();
        $firebaseService->sendToAllUsers($notificationPayload, $dataPayload);

        Notifications::create([
        'title' => $notificationPayload['title'],
        'body' => $notificationPayload['body'],
        'image' => $notificationPayload['image'],
        'product_id' => $product->id,
        'category_id' => $product->category_id,
        'screen' => $dataPayload['screen'],
        'name' => $product->name,
        'time' => now(),
    ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    public function edit($id)
    {
        $data['products'] = Products::find($id);
        $data['category'] = Category::where('status',1)->get();
        return view('admin.products.edit',$data);
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'category_id' => 'required',
    //         'description' => 'required',
    //         'price' => 'required',
    //         'mrp' => 'required',
    //         'weight' => 'required',
    //         'image_1' => 'nullable',
    //         'image_2' => 'nullable',
    //         'image_3' => 'nullable',
    //         'image_4' => 'nullable',
    //     ]);

    //     $product = Products::findOrFail($id);
    //     $product->name = $request->name;
    //     $product->price = $request->price;
    //     $product->mrp = $request->mrp;
    //     $product->weight = $request->weight;
    //     $product->category_id = $request->category_id;
    //     $product->description = $request->description;

    //     foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
    //         if ($request->hasFile($imageField)) {
    //             if ($product->$imageField && file_exists(public_path($product->$imageField))) {
    //                 unlink(public_path($product->$imageField));
    //             }

    //             $imageName = time() . '_' . $imageField . '.' . $request->file($imageField)->extension();
    //             $request->file($imageField)->move(public_path('uploads/products'), $imageName);
    //             $product->$imageField = 'uploads/products/' . $imageName;
    //         }
    //     }

    //     $product->save();

    //     return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    // }


 public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'price' => 'required',
            'mrp' => 'required',
            'weight' => 'required',
            'image_1' => 'nullable',
            'image_2' => 'nullable',
            'image_3' => 'nullable',
            'image_4' => 'nullable',
        ]);

        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->weight = $request->weight;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->auth_id = Auth::id();

        // Handle image uploads
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete old image if exists
                if ($product->$imageField && file_exists(public_path($product->$imageField))) {
                    unlink(public_path($product->$imageField));
                }

                $imageName = time() . '_' . $imageField . '.' . $request->file($imageField)->extension();
                $request->file($imageField)->move(public_path('uploads/products'), $imageName);
                $product->$imageField = 'uploads/products/' . $imageName;
            }
        }

        if ($request->hasFile('video')) {
            $videoName = time() . '_video.' . $request->file('video')->extension();
            $request->file('video')->move(public_path('uploads/videos'), $videoName);
            $product->video = 'uploads/videos/' . $videoName;
        }
        
        $product->save();

        // Now, send the Firebase notification to all users
       $notificationPayload = [
        'title' => 'Product Updated: ' . $product->name,
        'body' => 'Check out the updated details of ' . $product->name,
        'image' => asset($product->image_1),
    ];

    $dataPayload = [
        'product_id' => $product->id,
        'category_id' => $product->category_id,
        'screen' => 'ProductDetail',
    ];

   $firebaseService = new FirebaseNotificationService();
   $firebaseService->sendToAllUsers($notificationPayload, $dataPayload);

    Notifications::create([
        'title' => $notificationPayload['title'],
        'body' => $notificationPayload['body'],
        'image' => $notificationPayload['image'],
        'product_id' => $product->id,
        'category_id' => $product->category_id,
        'screen' => $dataPayload['screen'],
        'name' => $product->name,
        'time' => now(),
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');

    }


    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect()->route('products.index')->with('success', 'products deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Products::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('products.index')->with('success', 'products status updated successfully!');
    }
    
}
