<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /* показать страницу «Управление тегами» */
    public function tag_manage()
    {
        $title = 'Управление тегами';
        $tags  = Tag::orderBy('id','asc')->paginate(15);
        return view('admin.manage-tags', compact('title','tags'));
    }
    public function searchJson(Request $r)
    {
        $q = $r->get('q');
        return Tag::where('title','like',"%$q%")
                ->limit(15)
                ->get(['id','title']);
    }
    public function locate(Request $r)
    {
        $id = (int)$r->get('id');
        $perPage = 15;

        $pos = Tag::where('id','<=',$id)->count() - 1;
        if ($pos < 0) return response()->json(['found'=>false]);

        $page = (int)($pos / $perPage) + 1;
        $tag  = Tag::find($id,['id','title']);

        return response()->json([
            'found' => true,
            'page'  => $page,
            'tag'   => $tag
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['title'=>'required|string|max:255']);
        Tag::firstOrCreate($validated);        // аналогично createOrFirst
        return back()->with('success','Тег создан');
    }

    /* показать форму редактирования */
    public function edit(Tag $tag)
    {
        $title = 'Редактирование тега';
        return view('admin.edit-tag', compact('tag','title'));
    }

    /* обновить тег */
    public function update(Tag $tag, Request $request)
    {
        $validated = $request->validate(['title'=>'required|string|max:255']);
        $tag->update($validated);
        return redirect()->route('admin.manage.tags')->with('success','Тег обновлён');
    }

    /* удалить тег */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success','Тег удалён');
    }
}