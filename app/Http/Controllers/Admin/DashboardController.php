<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Админ-панель';
        $products = Product::all();
        $categories = Category::all();
        return view('admin.dashboard',compact('title','products','categories'));
    }
    public function searchJson(Request $r)
    {
        $q = $r->get('q');
        return Product::with('category')
            ->where('title','like',"%$q%")
            ->limit(15)
            ->get(['id','title']);
    }
    public function locate(Request $r)
    {
        $id   = (int)$r->get('id');
        $perPage = 15;                      

        // позиция товара в отсортированном списке (0-based)
        $pos = Product::where('id', '<=', $id)->count() - 1;
        if ($pos < 0)  return response()->json(['found'=>false]);

        $page = (int)($pos / $perPage) + 1;  // 1-based
        $product = Product::find($id, ['id','title']);

        return response()->json([
            'found' => true,
            'page'  => $page,
            'product' => $product
        ]);
    }
    public function product_manage(FilterRequest $request){
        $title = 'Управление товарами';

        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)
        ->whereHas('category')
        ->paginate(15)
        ->onEachSide(1);

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.manage-products',compact('title','products','categories','tags'));
    }
    public function tag_manage(Request $request){
        $title = 'Управление тегами';
        $tags = Tag::orderBy('id')->paginate(15);
        return view('admin.manage-tags',compact('title','tags'));
    }
}
