<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Depots;
use App\Models\Vendor;
use App\Models\Slider1;
use App\Models\State;

class Slider1Controller extends Controller
{

    public function index()
    {
        $slider = Slider1::all();
        return view('admin.slider1.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider1.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'type' => 'required',
        ]);


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/slider'), $imageName);

         $slider = new Slider1;
         $slider->title = $request->title;
         $slider->type = $request->type;
         $slider->image = 'uploads/slider/' . $imageName; 
         $slider->status = 1;
         $slider->save();


        return redirect()->route('slider1.index')->with('success', 'Slider created successfully.');
    }

    public function edit($id)
    {
        $data['slider1'] = Slider1::find($id);
        return view('admin.slider1.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'image' => 'nullable|image',
        ]);
    
        $slider = Slider1::findOrFail($id);
        $slider->title = $request->title;
        $slider->type = $request->type;
    
        if ($request->hasFile('image')) {
            $oldImagePath = public_path($slider->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/slider'), $imageName);
            $slider->image = 'uploads/slider/' . $imageName;
        }
    
        $slider->save();
    
        return redirect()->route('slider1.index')->with('success', 'Slider updated successfully.');
    }
    

    public function destroy($id)
    {
        $slider = Slider1::find($id);
        $slider->delete();
        return redirect()->route('slider1.index')->with('success', 'Slider deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Slider1::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('slider1.index')->with('success', 'Slider status updated successfully!');
    }
    
}
