@extends('layouts.admin-header')

@section('main-content')
<section class="admin-products">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <header class="admin-header-bar">
            <h1>Управление категориями</h1>
        </header>

        <button id="sidebarToggle" class="sidebar-toggle-btn">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <div class="admin-products-grid">

        {{-- ФОРМА --}}
        <aside class="product-form">
            <form action="{{ route('categories.store', $category->id ?? null) }}" method="POST">
                @csrf

                <h3>Создание категории</h3>

                <div class="form-group">
                    <label>Название</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $category->title ?? '') }}"
                        required
                    >

                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-save" id="saveBtn">Сохранить</button> 
            </form>
        </aside>

        {{-- СПИСОК --}}
        <main class="category-list">

            <div class="list-header">
                <h3>Список категорий</h3>
            </div>

            <div class="product-list">
                <div class="list-header"> 
                    <h3>Список категорий</h3> 
                </div> 
                <div class="product-table"> 
                    @forelse($categories as $c)
                        <div class="product-row-large" id="row-{{ $c->id }}">

                            <div class="product-main">
                                <strong>{{ $c->title }}</strong>
                                <div class="muted">ID: {{ $c->id }}</div>
                            </div>

                            <div class="product-actions">
                                <a href="{{ route('categories.edit', $c->id) }}"
                                class="action-edit"
                                title="Редактировать">
                                    ✏️
                                </a>

                                <form action="{{ route('categories.delete', $c->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Удалить категорию?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-delete" title="Удалить">
                                        🗑️
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="muted">Категорий пока нет</div>
                    @endforelse
                </div>
            </div>

            {{-- ПАГИНАЦИЯ --}}
            <div class="pagination mt-3">
                {{ $categories->links('admin.custom-pagination') }}
            </div>
        </main>

    </div>
</section>
@endsection