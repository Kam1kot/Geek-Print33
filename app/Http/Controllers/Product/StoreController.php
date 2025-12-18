<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')
                          ->store('products', 'public');

        $product = Product::create(Arr::except($validated, 'tags'));
        $product->tags()->sync($validated['tags'] ?? []);               
        return redirect()->back()->with('success', 'Товар создан');
    }
}
