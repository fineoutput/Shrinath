<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Block;

class BlockController extends Controller
{
  
    public function index()
    {
        $block = Block::orderBy('id','DESC')->get();
        return view('admin.block.index', compact('block'));
    }

    public function create()
    {
        return view('admin.block.create');
    }

 public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable',
        ]);

        $block = new Block;
        $block->title = $request->title;
        $block->description = $request->description;

        // Handle multiple images
        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/blocks'), $filename);
                $imagePaths[] = 'uploads/blocks/' . $filename;
            }
        }

        $block->image = json_encode($imagePaths);
        $block->status = 1;
        $block->save();

        return redirect()->route('block.index')->with('success', 'Block created successfully.');
    }

    public function edit($id)
    {
        $block = Block::findOrFail($id);
        return view('admin.block.edit', compact('block'));
    }

   public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable',
        ]);

        $block = Block::findOrFail($id);
        $block->title = $request->title;
        $block->description = $request->description;

        // Get existing images
        $existingImages = json_decode($block->image, true) ?? [];

        // Handle new images if uploaded
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/blocks'), $filename);
                $existingImages[] = 'uploads/blocks/' . $filename;
            }
        }

        $block->image = json_encode($existingImages);
        $block->save();

        return redirect()->route('block.index')->with('success', 'Block updated successfully.');
    }

    public function destroy($id)
    {
        $user = Block::findOrFail($id);
        $user->delete();

        return redirect()->route('block.index')->with('success', 'Block deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Block::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('user.index')->with('success', 'user status updated successfully!');
    }
    

}
