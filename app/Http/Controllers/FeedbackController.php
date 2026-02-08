<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class FeedbackController extends Controller
{
    public function feedbackPage() {
        $title = 'Обратная связь';
        $categories = Category::all();
        $tags = Tag::all();
        $items_cart = Cart::instance('cart')->content();
        $items_wishlist = Cart::instance('wishlist')->content();
        return view('feedback', compact('title', 'categories', 'items_cart', 'items_wishlist'));
    }
    public function feedbackSend(Request $request) {
        $feedback = $request->validate([
            'name' => 'min:3|required',
            'title' => 'required',
            'email' => 'min:1|required',
            'message' => 'min:1|required',
        ]);

        Mail::raw($request->message, function ($mail) use ($request) {

            $mail->to("kam1k0to@mail.ru")
                 ->subject($request->title . " | " . $request->name);
        });

        return back()->with('success', 'Сообщение отправлено!');
    }   
}
