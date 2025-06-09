<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\City;
use App\Models\Depots;
use App\Models\Vendor;
use App\Models\State;

class VendorController extends Controller
{

    public function index()
    {
        $vendors = Vendor::orderBy('id','DESC')->get();
        return view('admin.vendor.index', compact('vendors'));
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

    public function create()
    {
        $data['state'] = State::all();
        $data['depots'] = Depots::all();
        return view('admin.vendor.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'business_name' => 'required',
            'phone_no' => 'required',
            'email' => 'required|email|unique:vendor',
            'depot_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
        ]);

         $vendor = new Vendor;
         $vendor->name = $request->name;
         $vendor->business_name = $request->business_name;
         $vendor->phone_no = $request->phone_no;
         $vendor->email = $request->email;
         $vendor->depot_id = $request->depot_id;
         $vendor->state_id = $request->state_id;
         $vendor->city_id = $request->city_id;
         $vendor->status = 1;
         $vendor->save();


        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function edit($id)
    {
        $data['vendor'] = Vendor::find($id);
        $data['state'] = State::all();
        $data['depots'] = Depots::all();
        return view('admin.vendor.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'business_name' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'depot_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
        ]);
        
        $vendor = Vendor::find($id);
        $vendor->name = $request->name;
        $vendor->business_name = $request->business_name;
        $vendor->phone_no = $request->phone_no;
        $vendor->email = $request->email;
        $vendor->depot_id = $request->depot_id;
        $vendor->state_id = $request->state_id;
        $vendor->city_id = $request->city_id;
        $vendor->status = 1;
        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Vendor::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('vendors.index')->with('success', 'vendor status updated successfully!');
    }
    
}
