<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class DeleteImageController extends Controller
{
    public function __invoke(ProductImage $image)
    {
        // 1. Удаляем файл
        Storage::disk('public')->delete($image->path);

        // 2. Удаляем запись из базы
        $image->delete();

        return back()->with('success', 'Изображение удалено');
    }
}
