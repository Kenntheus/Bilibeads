<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $fproducts = Product::where('featured',1)->get()->take(8);
        return view('index',compact('categories','fproducts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name','LIKE', "%{$query}%")->get()->take(8);
        return response()->json($results);
    }
}
