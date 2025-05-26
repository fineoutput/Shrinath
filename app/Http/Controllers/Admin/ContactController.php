<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Depots;
use App\Models\Vendor;
use App\Models\Slider3;
use App\Models\Contact;
use App\Models\State;

class ContactController extends Controller
{
    public function index()
    {
        $Contact = Contact::all();
        return view('admin.contact.index', compact('Contact'));
    }


    public function updateStatus($id)
    {
        $subscription = Contact::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('gallery.index')->with('success', 'Slider status updated successfully!');
    }
    
}
