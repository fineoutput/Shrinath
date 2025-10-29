<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Category;
use App\Models\Stock;
use App\Models\State;

class StockController extends Controller
{

    public function index()
    {
        $category = Stock::orderBy('id','DESC')->get();
        return view('admin.stock.index', compact('category'));
    }

    public function create()
    {
        return view('admin.stock.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_name' => 'required',
            'stock_1d_name' => 'required',
        ]);

        $category = new Stock;
        $category->stock_name = $request->stock_name;
        $category->stock_1d_name = $request->stock_1d_name;
        $category->app_name = $request->app_name;
        $category->status = 1;
        $category->save();

        return redirect()->route('stock.index')->with('success', 'Stock created successfully.');
    }


    public function edit($id)
    {
        $data['category'] = Stock::find($id);
        return view('admin.stock.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'stock_name' => 'required',
        ]);

        $category = Stock::findOrFail($id);
         $category->stock_name = $request->stock_name;
        $category->stock_1d_name = $request->stock_1d_name;
         $category->app_name = $request->app_name;
        $category->status = 1;


        $category->save();

        return redirect()->route('stock.index')->with('success', 'Category updated successfully.');
    }


    public function destroy($id)
    {
        $category = Stock::find($id);
        $category->delete();
        return redirect()->route('stock.index')->with('success', 'category deleted successfully.');
    }

    public function updateStatus($id)
    {
        $subscription = Stock::findOrFail($id);
        $subscription->status = ($subscription->status == 1) ? 2 : 1;

        $subscription->save();
        return redirect()->route('stock.index')->with('success', 'category status updated successfully!');
    }
    
}
