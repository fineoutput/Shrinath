<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\adminmodel\Team;
use App\Models\Category;
use App\Models\Stock;
use App\Models\State;
use App\Models\StockCol;

class StockColController extends Controller
{
    public function index()
    {
        $category = StockCol::orderBy('id','DESC')->get();
        return view('admin.stockCol.index', compact('category'));
    }

    
    public function deleteLimit(Request $request)
    {
        $request->validate([
            'limit' => 'required|integer|min:1',
        ]);

        $limit = $request->input('limit');
        $deleted = StockCol::orderBy('id', 'ASC')->limit($limit)->get();
        $ids = $deleted->pluck('id');
        $count = StockCol::whereIn('id', $ids)->delete();

        return redirect()->route('stockcol.index')->with('success', "$count entries deleted successfully.");
    }
}
