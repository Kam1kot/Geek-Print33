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
use Illuminate\Support\Facades\Storage;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class UpdateController extends Controller
{
    public function __invoke(Product $product, UpdateRequest $request)
    {
        $validated = $request->validated();

    // Удаляем отмеченные картинки
    if ($request->filled('delete_images')) {

        foreach ($request->delete_images as $imageId) {

            $image = $product->images()->find($imageId);

            if ($image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
        }
    }

    // Добавляем новые картинки
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $path = $file->store('products', 'public');

            $product->images()->create([
                'path' => $path,
                'sort_order' => $product->images()->count()
            ]);
        }
    }

    // Обновляем товар
    $product->update(Arr::except($validated, ['images', 'delete_images', 'tags']));

    // Теги
    $product->tags()->sync($validated['tags'] ?? []);

    return redirect()->route('products.show', $product->id)
        ->with('success', 'Товар обновлён');
    }
}
