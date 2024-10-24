<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply auth middleware to all actions
    }

    public function index()
    {
        $items = Cart::instance('wishlist')->content();
        return view('wishlist', compact('items'));
    }

    public function add_to_wishlist(Request $request)
    {
        Cart::instance('wishlist')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back();
    }

    public function empty_wishlist()
    {
        Cart::instance('wishlist')->destroy();
        return redirect()->back();
    }

    public function move_to_cart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price)->associate('App\Models\Product');
        DB::table('user_wishlist')->where('user_id', Auth::id())
            ->where('product_id', $item->id)
            ->delete();
        return redirect()->back();
    }

    public function saveWishlistToDatabase()
    {
        $user_id = Auth::id();
        foreach (Cart::instance('wishlist')->content() as $item) {
            DB::table('user_wishlist')->updateOrInsert(
                ['user_id' => $user_id, 'product_id' => $item->id],
                ['name' => $item->name, 'quantity' => $item->qty, 'price' => $item->price]
            );
        }
    }

    public function loadWishlistFromDatabase()
    {
        $user_id = Auth::id();
        $savedWishlistItems = DB::table('user_wishlist')->where('user_id', $user_id)->get();

        foreach ($savedWishlistItems as $item) {
            Cart::instance('wishlist')->add($item->product_id, $item->name, $item->quantity, $item->price)->associate('App\Models\Product');
        }
    }
}
