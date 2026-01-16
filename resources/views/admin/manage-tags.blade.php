@extends('layouts.admin-header')

@section('main-content')
<section class="admin-products">

    <div class="d-flex justify-content-between"> 
        <header class="admin-header-bar"> 
            <h1>Управление тегами</h1> 
        </header> 
        <button id="sidebarToggle" class="sidebar-toggle-btn"> 
            <i class="fa-solid fa-align-justify"></i> 
        </button> 
    </div> 

    <div class="admin-products-grid">

        {{-- ФОРМА --}}
        <aside class="product-form">
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf
                <h3>Создание тега</h3>

                <div class="form-group">
                    <label>Название</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           required
                           class="@error('title') is-invalid @enderror">

                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-save" id="saveBtn">Сохранить</button> 
            </form>
        </aside>

        {{-- СПИСОК --}}
        <main class="product-list">

            <div class="list-header">
                <h3>Список тегов</h3>

                <div class="search-box">
                    <input type="text"
                        id="liveSearch"
                        data-search="tags"
                        placeholder="Поиск тега…"
                        autocomplete="off">

                    <div id="searchDrop" class="search-drop"></div>
                </div>
            </div>

            <div class="product-table">

                @php $highlight = request('highlight'); @endphp

                @foreach($tags as $tag)
                    <div class="product-row-large" data-tag-id="{{ $tag->id }}">

                        <div class="product-main">
                            <strong>#{{ $tag->title }}</strong>
                            <span class="muted">ID: {{ $tag->id }}</span>
                        </div>

                        <div class="product-actions">
                            <a href="{{ route('tags.edit', $tag) }}" title="Редактировать">✏️</a>

                            <form action="{{ route('tags.delete', $tag) }}"
                                  method="POST"
                                  onsubmit="return confirm('Удалить тег?');">
                                @csrf @method('DELETE')
                                <button title="Удалить">🗑️</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="pagination"> {{ $tags->links('admin.custom-pagination') }} </div> 

        </main>

    </div>
</section>
<script src="{{ asset('js/tag-search.js') }}"></script> 
@endsection
