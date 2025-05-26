<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Category;
use App\Models\State;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/category'), $imageName);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->image = 'uploads/category/' . $imageName; 
        $category->status = 1;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }


    public function edit($id)
    {
        $data['category'] = Category::find($id);
        return view('admin.category.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/category'), $imageName);
            $category->image = 'uploads/category/' . $imageName;
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'category deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Category::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('category.index')->with('success', 'category status updated successfully!');
    }
    
}
