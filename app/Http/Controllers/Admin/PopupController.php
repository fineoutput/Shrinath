<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Block;
use App\Models\Popup;

class PopupController extends Controller
{
  
    public function index()
    {
        $block = Popup::orderBy('id','DESC')->get();
        return view('admin.popup.index', compact('block'));
    }

    public function create()
    {
        return view('admin.popup.create');
    }

public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $block = new Popup;
    $block->status = 1; // Default status as active
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/popup/images'), $filename);
        $block->image = 'uploads/popup/images/' . $filename;
    }

    $block->save();

    return redirect()->route('popup.index')->with('success', 'Image uploaded successfully.');
}


    public function edit($id)
    {
        $popup = Popup::findOrFail($id);
        return view('admin.popup.edit', compact('popup'));
    }

 public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $block = Popup::findOrFail($id);

        // Delete existing image if present
        if ($block->image) {
            $existingImagePath = public_path($block->image);
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }
        }

        // Upload new image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/popup/images'), $filename);
            $block->image = 'uploads/popup/images/' . $filename;
        }

        $block->save();

        return redirect()->route('popup.index')->with('success', 'Image updated successfully.');
    }


    public function destroy($id)
    {
        $user = Popup::findOrFail($id);
        $user->delete();

        return redirect()->route('popup.index')->with('success', 'popup deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Popup::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('popup.index')->with('success', 'popup status updated successfully!');
    }
    

}
