<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CategoryController extends Controller
{
    public function store(Request $request) {
        $validated = $request->only(['title']);
        // dd($validated->request);
        Category::createOrFirst($validated);
        return redirect()->back()->with('success', 'Категория создана');
    }
    public function edit(Category $category) {
        $title = 'Редактирование категории';
        return view('category.edit', compact('category','title',));
    }
    public function update(Category $category, Request $request)
    {
        $validated = $request->only(['title']);

        $category->update($validated);
        return redirect()->route('admin.manage.categories')->with('success','Категория обновлена');
    }
    public function destroy(Category $category) {
        $category->delete();
        return back()->with('success', 'Товар удалён');
    }
    public function category_manage(Category $category){
        $title = 'Управление категориями';

        $categories = Category::orderBy('id','asc')->paginate(15);
        return view('admin.manage-categories',compact('title','categories', 'category'));
    }
}
