<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Category;
use App\Models\City;
use App\Models\Depots;
use App\Models\State;

class DepotsController extends Controller
{

    public function index()
    {
        $depots = Depots::all();
        return view('admin.depots.index', compact('depots'));
    }

    public function create()
    {
        $data['states'] = State::all();
        return view('admin.depots.create',$data);
    }

 public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'location' => 'required',
            'contact_person_name' => 'required',
            'manager' => 'required',
            'email' => 'required|email',
            'working_hours' => 'required',
            'officetype' => 'nullable|string',
            'pincode' => 'nullable|string',
            'contact' => 'nullable|string',
            'state' => 'required',
            'city' => 'required',
            'img' => 'nullable',
        ]);

        $depots = new Depots;
        $depots->name = $request->name;
        $depots->latitude = $request->latitude;
        $depots->longitude = $request->longitude;
        $depots->location = $request->location;
        $depots->contact_person_name = $request->contact_person_name;
        $depots->manager = $request->manager;
        $depots->email = $request->email;
        $depots->working_hours = $request->working_hours;
        $depots->officetype = $request->officetype;
        $depots->pincode = $request->pincode;
        $depots->contact = $request->contact;
        $depots->state_id = $request->state;
        $depots->city_id = $request->city;
        $depots->status = 1;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/depots');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);

            $depots->img = 'uploads/depots/' . $imageName;
        }

        $depots->save();

        return redirect()->route('depots.index')->with('success', 'Depot created successfully.');
    }



    public function edit($id)
    {
        $data['depots'] = Depots::find($id);
        $data['states'] = State::all();
        $data['cities'] = City::where('state_id', $data['depots']->state)->get(); 
        return view('admin.depots.edit',$data);
    }

  public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'location' => 'required',
            'contact_person_name' => 'required',
            'manager' => 'required',
            'email' => 'required|email',
            'working_hours' => 'required',
            'officetype' => 'nullable|string',
            'pincode' => 'nullable|string',
            'contact' => 'nullable|string',
            'state' => 'required',
            'city' => 'required',
            'img' => 'nullable',
        ]);

        $depots = Depots::findOrFail($id);

        $depots->name = $request->name;
        $depots->latitude = $request->latitude;
        $depots->longitude = $request->longitude;
        $depots->location = $request->location;
        $depots->contact_person_name = $request->contact_person_name;
        $depots->manager = $request->manager;
        $depots->email = $request->email;
        $depots->working_hours = $request->working_hours;
        $depots->officetype = $request->officetype;
        $depots->pincode = $request->pincode;
        $depots->contact = $request->contact;
        $depots->state_id = $request->state;
        $depots->city_id = $request->city;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/depots');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);

            if (!empty($depots->img) && file_exists(public_path($depots->img))) {
                unlink(public_path($depots->img));
            }

            $depots->img = 'uploads/depots/' . $imageName;
        }

        $depots->save();

        return redirect()->route('depots.index')->with('success', 'Depot updated successfully.');
    }
    


    public function destroy($id)
    {
        $depots = Depots::find($id);
        $depots->delete();
        return redirect()->route('depots.index')->with('success', 'depots deleted successfully.');
    }

    public function updateStatus($id)
    {
        $depots = Depots::findOrFail($id);
        $depots->status = ($depots->status == 1) ? 2 : 1;

        $depots->save();
        return redirect()->route('depots.index')->with('success', 'depots status updated successfully!');
    }


    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
    
}
