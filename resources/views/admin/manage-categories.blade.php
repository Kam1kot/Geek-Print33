@extends('layouts.admin-header')
@section('main-content')
<section class="content-wrapper manage-categories">
    <div class="content-inner">
        <div class="w-100 p-4 d-flex gap-3">
            <div class="form-wrapper">
                <form action="{{ route('categories.store', $category->id) }}" method="POST" id="categoryForm">
                    @csrf

                    <h3>Создание категории</h3>

                    {{-- Название категории --}}
                    <div class="mb-3">
                        <label class="form-label">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $category->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Кнопки --}}
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

                {{-- Глобальные ошибки --}}
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            {{-- ПРАВЫЙ БЛОК: СПИСОК КАТЕГОРИЙ --}}
            <div class="category-list-wrapper">
                <div class="text-start mt-2">
                    <h2 class="fs-2 fw-medium">Список категорий</h2>
                </div>

                <div class="admin-table-wrapper mt-3">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th style="width: 180px;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->title }}</td>
                                    <td class="actions">
                                        <a href="{{ route('categories.edit', $c->id) }}"
                                           class="btn btn-sm btn-primary">✏️ Редактировать</a>

                                        <form action="{{ route('categories.delete', $c->id) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Удалить категорию?');">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">🗑️ Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrapper mt-3">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection