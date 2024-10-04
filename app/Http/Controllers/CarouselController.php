<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Cart;
use App\Models\Latest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarouselController extends Controller
{
    public function index()
{
    $pictures = Carousel::all();
    
    // Fetch only the latest 5 products (or adjust the number as needed)
    $latest_products = Product::latest()->take(5)->get();
    
    return view('carousel', compact('pictures', 'latest_products'));
}
    public function addcart(Request $request, $id){



        if(Auth::check()){
            $user =auth()->user();
                if ($user) {
                $product=Product::find($id);
                $cart=new Cart;
                $cart->name=$user->name?? null;
                $cart->product_title=$product->title;
                $cart->product_price=$product->price;
                $cart->quantity=$request->quantity;
                $cart->product_category=$product->category;
                $cart->product_photo=$product->gallery;
                $cart->save();
                return redirect()->back()->with('message','Product Added successfully');
                }
        }
        else{
            return redirect('login');
        }
        
    }
}
