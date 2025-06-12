<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Depots;
use App\Models\Vendor;
use App\Models\Slider3;
use App\Models\Appointments;
use App\Models\State;

class AppointmentsController extends Controller
{
    public function index()
    {
        $appointments = Appointments::orderBy('id','DESC')->get();
        return view('admin.appointments.index', compact('appointments'));
    }


    public function updateStatus($id)
    {
        $subscription = Appointments::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('gallery.index')->with('success', 'Slider status updated successfully!');
    }
    
}
