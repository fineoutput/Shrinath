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
            'image' => 'nullable|array',
            'image.*' => 'image',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:10240', 
            'profile_image' => 'nullable|image',
        ]);

        $block = new Block;
        $block->title = $request->title;
        $block->description = $request->description;

        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/blocks/images'), $filename);
                $imagePaths[] = 'uploads/blocks/images/' . $filename;
            }
        }
        $block->image = json_encode($imagePaths);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/blocks/videos'), $filename);
            $block->video = 'uploads/blocks/videos/' . $filename;
        }

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $filename = time() . '_' . uniqid() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('uploads/blocks/profile_images'), $filename);
            $block->profile_image = 'uploads/blocks/profile_images/' . $filename;
        }

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

        $existingImages = json_decode($block->image, true) ?? [];

        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $removeImage) {
                if (($key = array_search($removeImage, $existingImages)) !== false) {
                    unset($existingImages[$key]);

                    $filePath = public_path($removeImage);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            $existingImages = array_values($existingImages);
        }

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/blocks'), $filename);
                    $existingImages[] = 'uploads/blocks/' . $filename;
                }
            }

            if ($request->has('remove_profile_image') && $request->remove_profile_image == 1) {
            if ($block->profile_image && file_exists(public_path($block->profile_image))) {
                unlink(public_path($block->profile_image));
            }
            $block->profile_image = null;
            }

            if ($request->hasFile('profile_image')) {
                if ($block->profile_image && file_exists(public_path($block->profile_image))) {
                    unlink(public_path($block->profile_image));
                }
                $profileImage = $request->file('profile_image');
                $filename = time() . '_' . uniqid() . '.' . $profileImage->getClientOriginalExtension();
                $profileImage->move(public_path('uploads/blocks/profile_images'), $filename);
                $block->profile_image = 'uploads/blocks/profile_images/' . $filename;
            }

            if ($request->has('remove_video') && $request->remove_video == 1) {
                if ($block->video && file_exists(public_path($block->video))) {
                    unlink(public_path($block->video));
                }
                $block->video = null;
            }

            if ($request->hasFile('video')) {
                if ($block->video && file_exists(public_path($block->video))) {
                    unlink(public_path($block->video));
                }
                $video = $request->file('video');
                $filename = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('uploads/blocks/videos'), $filename);
                $block->video = 'uploads/blocks/videos/' . $filename;
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
