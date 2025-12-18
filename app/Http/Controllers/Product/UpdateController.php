<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class UpdateController extends Controller
{
    public function __invoke(Product $product, UpdateRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                                    ->store('products', 'public');
        } else {
            unset($validated['image']);
        }

        $product->update(Arr::except($validated, 'tags'));
        $product->tags()->sync($validated['tags'] ?? []);
        
        return redirect()->route('products.show',$product->id);
    }
}
