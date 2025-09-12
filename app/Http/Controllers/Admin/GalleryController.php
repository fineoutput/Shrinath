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

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id','DESC')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $data['category'] = GalleryCategory::where('status',1)->get();
        return view('admin.gallery.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/gallery'), $imageName);

        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->category_id = $request->category_id;
        $gallery->image = 'uploads/gallery/' . $imageName; 
        $gallery->status = 1;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery created successfully.');
    }

    public function edit($id)
    {
        $data['category'] = GalleryCategory::where('status',1)->get();
        $data['gallery'] = Gallery::findOrFail($id);
        return view('admin.gallery.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/gallery'), $imageName);
            $gallery->image = 'uploads/gallery/' . $imageName;
        }

        $gallery->title = $request->title;
        $gallery->category_id = $request->category_id;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }

        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Gallery::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('gallery.index')->with('success', 'Slider status updated successfully!');
    }
    
}
