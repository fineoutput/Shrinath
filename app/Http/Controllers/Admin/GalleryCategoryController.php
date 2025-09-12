<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Depots;
use App\Models\Vendor;
use App\Models\Slider3;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\State;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $galleries = GalleryCategory::orderBy('id','DESC')->get();
        return view('admin.gallery_category.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $gallery = new GalleryCategory;
        $gallery->title = $request->title;
        $gallery->status = 1;
        $gallery->save();

        return redirect()->route('gallery_category.index')->with('success', 'Gallery created successfully.');
    }

    public function edit($id)
    {
        $gallery = GalleryCategory::findOrFail($id);
        return view('admin.gallery_category.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = GalleryCategory::findOrFail($id);

        $request->validate([
            'title' => 'required',
        ]);

        $gallery->title = $request->title;
        $gallery->save();

        return redirect()->route('gallery_category.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = GalleryCategory::findOrFail($id);
        $gallery->delete();
        return redirect()->route('gallery_category.index')->with('success', 'Gallery deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = GalleryCategory::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('gallery_category.index')->with('success', 'Slider status updated successfully!');
    }
    
}
