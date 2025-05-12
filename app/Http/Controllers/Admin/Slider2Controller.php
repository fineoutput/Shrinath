<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Depots;
use App\Models\Vendor;
use App\Models\Slider2;
use App\Models\State;

class Slider2Controller extends Controller
{

    public function index()
    {
        $slider = Slider2::all();
        return view('admin.slider2.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider2.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/slider'), $imageName);

         $slider = new Slider2;
         $slider->title = $request->title;
         $slider->image = 'uploads/slider/' . $imageName; 
         $slider->status = 1;
         $slider->save();


        return redirect()->route('slider2.index')->with('success', 'Slider created successfully.');
    }

    public function edit($id)
    {
        $data['slider2'] = Slider2::find($id);
        return view('admin.slider2.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);
    
        $slider = Slider2::findOrFail($id);
        $slider->title = $request->title;
    
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
    
        return redirect()->route('slider2.index')->with('success', 'Slider updated successfully.');
    }
    

    public function destroy($id)
    {
        $slider = Slider2::find($id);
        $slider->delete();
        return redirect()->route('slider2.index')->with('success', 'Slider deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Slider2::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('slider2.index')->with('success', 'Slider status updated successfully!');
    }
    
}
