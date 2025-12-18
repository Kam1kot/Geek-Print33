@extends('layouts.admin-header')

@section('main-content')
<section class="content-wrapper manage-tags">
    <div class="content-inner">
        <div class="w-100 p-4 d-flex gap-3">    
            {{-- ЛЕВЫЙ БЛОК: форма создания --}}
            <div class="form-wrapper">
                <form action="{{ route('tags.store') }}" method="POST" id="tagForm">
                    @csrf
                    <h3>Создание тега</h3>

                    <div class="mb-3">
                        <label class="form-label">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            {{-- ПРАВЫЙ БЛОК: список тегов --}}
            <div class="tag-list-wrapper">
                <div class="text-start mt-2">
                    <h2 class="fs-2 fw-medium">Список тегов</h2>
                    <div class="position-relative mb-3" style="max-width:320px;">
                        <input type="text" id="liveSearch-tag" class="form-control" placeholder="Быстрый поиск по тегу…" autocomplete="off">
                        <div id="searchDrop-tag" class="search-drop"></div>
                    </div>
                </div>

                <div class="admin-table-wrapper mt-3">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th><th>Название</th><th style="width:180px;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $highlight = request('highlight'); @endphp
                            @if($highlight)
                            <script>
                                window.addEventListener('DOMContentLoaded',()=>{
                                    const row = document.getElementById('row-{{ $highlight }}');
                                    if(row){
                                        row.scrollIntoView({behavior:'smooth', block:'center'});
                                        row.classList.add('highlight');
                                        setTimeout(()=>row.classList.remove('highlight'),2000);
                                    }
                                });
                            </script>
                            @endif
                            @foreach($tags as $t)
                                <tr id="row-{{ $t->id }}">
                                    <td>{{ $t->id }}</td>
                                    <td>{{ $t->title }}</td>
                                    <td class="actions">
                                        <a href="{{ route('tags.edit', $t) }}"
                                           class="btn btn-sm btn-primary">✏️ Редактировать</a>

                                        <form action="{{ route('tags.delete', $t) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Удалить тег?');">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">🗑️ Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper">
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* live-search */
        const searchInp = document.getElementById('liveSearch-tag');
        const searchBox = document.getElementById('searchDrop-tag');
        let   searchTimer;

        searchInp.addEventListener('input', ()=>{
            clearTimeout(searchTimer);
            const q = searchInp.value.trim();
            if(!q) {searchBox.innerHTML=''; return;}
            searchTimer = setTimeout(()=>{
                fetch('{{ route("tags.search.json") }}?q='+encodeURIComponent(q))
                    .then(r=>r.json())
                    .then(list=>{
                        searchBox.innerHTML='';
                        list.forEach(t=>{
                            const a=document.createElement('a');
                            a.href='#';
                            a.textContent=`${t.title} (id:${t.id})`;
                            a.dataset.id=t.id;
                            searchBox.appendChild(a);
                        });
                        if(!list.length) searchBox.innerHTML='<div class="px-3 py-2 text-muted">Нет результатов</div>';
                    });
            },250);
        });

        /* клик по результату -> переход на нужную страницу */
        searchBox.addEventListener('click',e=>{
            e.preventDefault();
            const a = e.target.closest('a');
            if(!a) return;
            fetch('{{ route("tags.locate") }}?id='+a.dataset.id)
                .then(r=>r.json())
                .then(d=>{
                    if(!d.found) return alert('Тег не найден');
                    location.href = '{{ route("admin.manage.tags") }}?page='+d.page+'&highlight='+d.tag.id+'#row-'+d.tag.id;
                });
        });

        /* скрыть выпадашку при клике вне */
        document.addEventListener('click',e=>{
            if(!e.target.closest('#liveSearch-tag') && !e.target.closest('#searchDrop-tag'))
                searchBox.innerHTML='';
        });
        </script>
</section>
@endsection