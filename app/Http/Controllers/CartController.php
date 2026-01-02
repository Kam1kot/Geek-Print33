<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Telegram\Bot\Laravel\Facades\Telegram;
use Jenssegers\Agent\Agent;

class CartController extends Controller
{
    public function cart_submit() {
        $title = 'Оформление заказа';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        return view('cart.cart_submit',compact('items_cart', 'items_wishlist','categories', 'title'));
    }
    public function index() {
        $title = 'Корзина';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        $agent = new Agent();
        return view('cart.cart',compact('agent','items_cart', 'items_wishlist','categories', 'title'));
    }
    public function add_to_cart(Request $request) {
        // dd($request);
        Cart::instance('cart')->add($request->id, $request->title, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back()->withFragment('product_' . $request->id);
    }
    
    public function add_to_cart_from_wishlist($rowId, Request $request) {
        // dd($request);
        Cart::instance('cart')->add($request->id, $request->title, 1, $request->price)->associate('App\Models\Product');
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back();
    }
    public function increase_cart_quantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back()->withFragment('product_'.$product->id);
    }
    public function decrease_cart_quantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back()->withFragment('product_'.$product->id);
    }
    public function remove_item($rowId) {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }
    public function empty_cart() {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }
    public function order_thanks() {
        $title = 'Спасибо за заказ!';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();

        return view('cart.thanks',compact('items_cart', 'items_wishlist','categories', 'title'));
    }
    public function send_order(Request $request)
    {
        $validated = $request->validate([
        'first-name' => 'required|string|max:20',
        'last-name'  => 'required|string|max:36',
        'phone'      => 'required|string|max:11',
        'city'       => 'required|string|max:30',
        'street'     => 'required|string|max:70',
        'index'      => 'required|integer',
        'comment'    => 'nullable|string|max:500'
    ]);

        app(TelegramService::class)->checkout($validated);

        Cart::instance('cart')->destroy();

        return redirect()->route('cart.thanks.order');
    }
}