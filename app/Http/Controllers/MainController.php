<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class MainController extends Controller
{
    public function index() {
        $title = 'Главная страница';
        $products = Product::all();
        $categories = Category::all();
        $tags = Tag::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        return view('index', compact('title','products', 'categories', 'items_cart', 'items_wishlist'));
    }
    // public function admin() {
    //     $title = 'Админ-панель';
    //     $products = Product::all();
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.dashboard', compact('title','categories'));
    // }
    public function delivery() {
        $title = 'Доставка и оплата';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        return view('delivery', compact('title','categories', 'items_cart', 'items_wishlist'));
    }
    public function contacts() {
        $title = 'Контакты';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        return view('contacts', compact('title','categories', 'items_cart', 'items_wishlist'));
    }
    public function about_us() {
        $title = 'О нас';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        return view('about_us', compact('title','categories', 'items_cart', 'items_wishlist'));
    }
    public function privacy() {
        $title = 'О нас';
        $categories = Category::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        return view('privacy', compact('title','categories', 'items_cart', 'items_wishlist'));
    }
    public function search(Request $request) {
        $query = $request->input('query');
        $results = Product::where('title', 'LIKE', "%{$query}%")->get()->take(6);
        return response()->json($results);
    }
}
