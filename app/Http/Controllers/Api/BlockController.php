<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Slider2;
use App\Models\Slider1;
use App\Models\Category;
use App\Models\Products;
use App\Models\Depots;
use App\Models\Popup;

class BlockController extends Controller
{
    
 public function getBlock()
    {
        $blocks = Block::latest()->get();

        if ($blocks->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No blocks found',
                'data' => []
            ], 404);
        }

        $formattedBlocks = $blocks->map(function ($block) {
            // Handle multiple images
            $images = [];
            $imageArray = json_decode($block->image, true);

            if (is_array($imageArray)) {
                $images = array_map(function ($img) {
                    return asset($img);
                }, $imageArray);
            }

            // Handle profile image
            $profileImage = $block->profile_image ? asset($block->profile_image) : null;

            // Handle video
            $video = $block->video ? asset($block->video) : null;

            return [
                'title' => $block->title,
                'description' => strip_tags($block->description),
                'images' => $images,
                'profile_image' => $profileImage,
                'video' => $video,
                'created_at' => $block->created_at->toDateTimeString(),
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'All blocks fetched successfully',
            'data' => $formattedBlocks
        ]);
    }


  public function popup()
    {
        $block = Popup::orderBy('id', 'DESC')->where('status', 1)->first();

        if (!$block) {
            return response()->json([
                'status' => 201,
                'message' => 'No popup image found',
                'data' => []
            ], 404);
        }

        $imageUrl = $block->image ? asset($block->image) : null;

        return response()->json([
            'status' => 200,
            'message' => 'Popup image fetched successfully',
            'data' => [
                'image' => $imageUrl
            ]
        ]);
    }

    public function getAllSliders()
    {
        $sliders = Slider2::latest()->get();

        if ($sliders->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No sliders found',
                'data' => []
            ], 404);
        }

        $formattedSliders = $sliders->map(function ($slider) {
            return [
                'title' => $slider->title,
                'image' => asset($slider->image), 
                'status' => $slider->status,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Slider data fetched successfully',
            'data' => $formattedSliders
        ]);
    }


    public function getAllSliders1()
    {
        $sliders = Slider1::where('type','app')->orderBy('id','DESC')->get();

        if ($sliders->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No sliders found',
                'data' => []
            ], 404);
        }

        $formattedSliders = $sliders->map(function ($slider) {
            return [
                'title' => $slider->title,
                'image' => asset($slider->image), 
                'status' => $slider->status,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Slider data fetched successfully',
            'data' => $formattedSliders
        ]);
    }


    public function getAllCategories()
    {
        $categories = Category::where('status',1)->orderBy('id','DESC')->get();

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No categories found',
                'data' => []
            ], 404);
        }

        $formattedCategories = $categories->map(function ($category) {
            return [
                'category_name' => $category->category_name,
                'image' => asset($category->image), 
                'description' => strip_tags($category->description),
                'status' => $category->status,
                'id' => $category->id,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Category data fetched successfully',
            'data' => $formattedCategories
        ]);
    }


  public function getProductsByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');

        if (!$categoryId) {
            return response()->json([
                'status' => 201,
                'message' => 'category_id is required',
                'data' => []
            ], 422);
        }

        // $products = Products::where('status', 1)->where('category_id', $categoryId)->latest()->get();
        $products = Products::where('status', 1)
    ->whereRaw('FIND_IN_SET(?, category_id)', [$categoryId])
    ->latest()
    ->get();


        if ($products->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No products found for this category',
                'data' => []
            ], 404);
        }

        $formattedProducts = $products->map(function ($product) {
            $images = array_filter([
                $product->image_1 ? asset($product->image_1) : null,
                $product->image_2 ? asset($product->image_2) : null,
                $product->image_3 ? asset($product->image_3) : null,
                $product->image_4 ? asset($product->image_4) : null,
            ]);

            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'mrp' => $product->mrp,
                'weight' => $product->weight,
                'category_id' => $product->category_id,
                'description' => $this->parseDescription($product->description),
                'status' => $product->status,
                'images' => array_values($images),
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Products retrieved successfully',
            'data' => $formattedProducts
        ]);
    }




 public function getProductById(Request $request)
    {
        $productId = $request->input('product_id');

        if (!$productId) {
            return response()->json([
                'status' => 201,
                'message' => 'product_id is required',
                'data' => []
            ], 422);
        }

        $product = Products::find($productId);

        if (!$product) {
            return response()->json([
                'status' => 201,
                'message' => 'Product not found',
                'data' => []
            ], 404);
        }

        $images = array_filter([
            $product->image_1 ? asset($product->image_1) : null,
            $product->image_2 ? asset($product->image_2) : null,
            $product->image_3 ? asset($product->image_3) : null,
            $product->image_4 ? asset($product->image_4) : null,
        ]);

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'mrp' => $product->mrp,
            'weight' => $product->weight,
            'category_id' => $product->category_id,
           'description' => $this->parseDescription($product->description),
            'status' => $product->status,
            'images' => array_values($images),
        ];

        return response()->json([
            'status' => 200,
            'message' => 'Product retrieved successfully',
            'data' => $formattedProduct
        ]);
    }


private function parseDescription($description)
{
    if (empty($description)) {
        return [];
    }

    // Step 1: <p> और <br> को newline में convert करो
    $raw = preg_replace(['/<\/?p[^>]*>/i', '/<br\s*\/?>/i'], "\n", $description);
    $raw = strip_tags($raw);

    // Step 2: Multiple newlines को single newline में convert करो
    $raw = preg_replace("/\n+/", "\n", trim($raw));

    // Step 3: Lines में split करो
    $lines = array_filter(array_map('trim', explode("\n", $raw)));

    $tables = [];
    $tableCounter = 1;

    foreach ($lines as $line) {
        $items = explode('$', $line);
        $items = array_map('trim', $items);
        $items = array_filter($items); // empty remove

        if (count($items) < 2) continue; // valid data check

        // Pehle 2 items header hamesha S.No. aur Product
        $header = [$items[0], $items[1]];

        $dataRows = [];
        for ($i = 2; $i < count($items); $i += 2) {
            if (isset($items[$i]) && isset($items[$i + 1])) {
                $dataRows[] = [
                    'head' => $items[$i],
                    'value' => $items[$i + 1]
                ];
            }
        }

        $tables[] = [
            'table_number' => $tableCounter++,
            'header' => [
                'head' => $header[0],
                'value' => $header[1]
            ],
            'rows' => $dataRows
        ];
    }

    return $tables;
}




    public function getAllDepots()
    {
        $depots = Depots::latest()->get();

        if ($depots->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No depots found',
                'data' => []
            ], 404);
        }

        $formattedDepots = $depots->map(function ($depot) {
            return [
                'id' => $depot->id,
                'name' => $depot->name,
                'latitude' => $depot->latitude,
                'longitude' => $depot->longitude,
                'location' => $depot->location,
                'contact_person_name' => $depot->contact_person_name,
                'manager' => $depot->manager,
                'email' => $depot->email,
                'working_hours' => $depot->working_hours,
                'contact' => $depot->contact,
                'pincode' => $depot->pincode,
                'officetype' => $depot->officetype,
                'state' => $depot->state->state_name ?? '',
                'city' => $depot->city->city_name ?? '',
                'image' => asset($depot->img),
                'status' => $depot->status,
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Depot data fetched successfully',
            'data' => $formattedDepots
        ]);
    }


}
