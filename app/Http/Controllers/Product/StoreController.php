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
        $validated['sold'] = 0;

        $product = Product::create(
            Arr::except($validated, ['images', 'tags'])
        );

        foreach ($request->file('images') as $index => $file) {
            $path = $file->store('products', 'public');

            $product->images()->create([
                'path' => $path,
                'sort_order' => $index
            ]);
        }

        $product->tags()->sync($validated['tags'] ?? []);

        return redirect()->back()->with('success', 'Товар создан');
    }
}
