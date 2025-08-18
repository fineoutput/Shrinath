<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SniPrice;


class SniPriceController extends Controller
{
    
    public function index()
    {
        $prices = SniPrice::orderBy('id','DESC')->get();
        return view('admin.sni_prices.index', compact('prices'));
    }

    public function create()
    {
        return view('admin.sni_prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'current_price' => 'required|numeric',
            'change_type' => 'required|in:fixed,percentage',
            // 'change_value' => 'required|numeric',
        ]);

        $SniPrice = new SniPrice;
        $SniPrice->name = $request->name;
        $SniPrice->price = $request->price;
        $SniPrice->current_price = $request->current_price;
        $SniPrice->change_type = $request->change_type;
        // $SniPrice->change_value = $request->change_value;
        $SniPrice->save();

        return redirect()->route('sni_price.index')->with('success', 'Price entry added.');
    }

    public function edit($id)
    {
        $price = SniPrice::findOrFail($id);
        return view('admin.sni_prices.edit', compact('price'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'current_price' => 'required|numeric',
            'change_type' => 'required|in:fixed,percentage',
            // 'change_value' => 'required|numeric',
        ]);

        $price = SniPrice::findOrFail($id);
        $price->name = $request->name;
        $price->price = $request->price;
        $price->current_price = $request->current_price;
        $price->change_type = $request->change_type;
        // $price->change_value = $request->change_value;
        $price->save();

        return redirect()->route('sni_price.index')->with('success', 'Price entry updated.');
    }

    public function destroy($id)
    {
        $price = SniPrice::findOrFail($id);
        $price->delete();

        return redirect()->route('sni_price.index')->with('success', 'Price entry deleted.');
    }

}
