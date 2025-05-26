<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Category;
use App\Models\Products;
use App\Models\State;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::all();
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
            'image_1' => 'nullable',
            'image_2' => 'nullable',
            'image_3' => 'nullable',
            'image_4' => 'nullable',
        ]);
    
        $product = new Products;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->status = 1;

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $imageName = time() . '_' . $imageField . '.' . $request->file($imageField)->extension();
                $request->file($imageField)->move(public_path('uploads/products'), $imageName);
                $product->$imageField = 'uploads/products/' . $imageName;
            }
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    public function edit($id)
    {
        $data['products'] = Products::find($id);
        $data['category'] = Category::where('status',1)->get();
        return view('admin.products.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'image_1' => 'nullable',
            'image_2' => 'nullable',
            'image_3' => 'nullable',
            'image_4' => 'nullable',
        ]);

        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                if ($product->$imageField && file_exists(public_path($product->$imageField))) {
                    unlink(public_path($product->$imageField));
                }

                $imageName = time() . '_' . $imageField . '.' . $request->file($imageField)->extension();
                $request->file($imageField)->move(public_path('uploads/products'), $imageName);
                $product->$imageField = 'uploads/products/' . $imageName;
            }
        }

        $product->save();

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
