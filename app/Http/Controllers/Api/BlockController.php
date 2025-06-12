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
            $images = [];

            $imageArray = json_decode($block->image, true);

            if (is_array($imageArray)) {
                $images = array_map(function ($img) {
                    return asset('images/' . $img);
                }, $imageArray);
            } else {
                $images[] = asset('images/' . $block->image);
            }

            return [
                'title' => $block->title,
                'description' => strip_tags($block->description),
                'images' => $images,
                'created_at' => $block->created_at->toDateTimeString(),
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'All blocks fetched successfully',
            'data' => $formattedBlocks
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
        $sliders = Slider1::latest()->get();

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
        $categories = Category::latest()->get();

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
                'image' => asset('images/' . $category->image), 
                'description' => strip_tags($category->description),
                'status' => $category->status,
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

        $products = Products::where('category_id', $categoryId)->latest()->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 201,
                'message' => 'No products found for this category',
                'data' => []
            ], 404);
        }

        $formattedProducts = $products->map(function ($product) {
            // Collect all images into one array
            $images = array_filter([
                $product->image_1 ? asset($product->image_1) : null,
                $product->image_2 ? asset($product->image_2) : null,
                $product->image_3 ? asset($product->image_3) : null,
                $product->image_4 ? asset($product->image_4) : null,
            ]);

            return [
                'name' => $product->name,
                'price' => $product->price,
                'mrp' => $product->mrp,
                'weight' => $product->weight,
                'category_id' => $product->category_id,
                'description' => strip_tags($product->description),
                'status' => $product->status,
                'images' => array_values($images), // Reset array index
            ];
        });

        return response()->json([
            'status' => 200,
            'message' => 'Products retrieved successfully',
            'data' => $formattedProducts
        ]);
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
