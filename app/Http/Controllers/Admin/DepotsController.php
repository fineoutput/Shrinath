<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Category;
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
        return view('admin.depots.create');
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
    $depots->status = 1;

    $depots->save();

    return redirect()->route('depots.index')->with('success', 'Depot created successfully.');
}



    public function edit($id)
    {
        $data['depots'] = Depots::find($id);
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
    
}
