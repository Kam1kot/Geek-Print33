<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Jenssegers\Agent\Agent;

class WishlistController extends Controller
{
    public function index() {
        $title = 'Избранное';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        $agent = new Agent();
        return view('wishlist',compact('agent','items_cart', 'items_wishlist','categories', 'title'));
    }
    public function add_to_wishlist(Request $request) {
        // dd($request);
        Cart::instance('wishlist')->add($request->id, $request->title, 1, $request->price)->associate('App\Models\Product');
        return redirect()->back()->withFragment('product_' . $request->id);
    }
    public function remove_item($rowId) {
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back();
    }
    public function empty_wishlist() {
        Cart::instance('wishlist')->destroy();
        return redirect()->back();
    }
}
