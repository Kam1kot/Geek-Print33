@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper">
        <div class="content-inner">
            <div class="text-center mt-2 mb-5">
                <h2 class="fs-1 fw-medium">Каталог</h2>
            </div>
        </div>
        <div class="catalog-wrapper">
            <div class="d-flex justify-content-center mb-5">
                <div class="text-block position-relative">
                    <h2 class="fs-5 position-absolute ms-2 fw-bold">Сортировка</h2>
                    <div class="categories">
                        <form method="GET" action="{{ route('products.index') }}" class="filter-form" id="filter-form">
                            <div class="d-flex flex-column gap-1">
                                <p>Категории</p>
                                <div class="d-flex gap-3">
                                    @foreach($categories as $category)
                                        <label class="filter-item">
                                            <input type="checkbox"
                                                name="category_id[]"
                                                @checked(request('category_id[]') == $category->id)
                                                value="{{ $category->id }}"
                                                {{ in_array($category->id, request('category_id',[])) ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <span class="checkmark"></span>
                                            <span class="category-name">{{ $category->title }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="sorting">
                                <p>Тип сортировки</p>
                                <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>По дате добавления</option>
                                    <option value="2" {{ request('sort') == '2' ? 'selected' : '' }}>По популярности</option>
                                    <option value="3" {{ request('sort') == '3' ? 'selected' : '' }}>Цена ↑</option>
                                    <option value="4" {{ request('sort') == '4' ? 'selected' : '' }}>Цена ↓</option>
                                    <option value="5" {{ request('sort') == '5' ? 'selected' : '' }}>Название А-Я</option>
                                    <option value="6" {{ request('sort') == '6' ? 'selected' : '' }}>Название Я-А</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="products-list">
                @forelse ($products as $product)
                    @include('product.card', ['product' => $product])
                @empty
                    <p>Ничего не найдено</p>
                @endforelse
            </div>
        </div>
        <div class="paginate">
            <div class="paginate-inner">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </section>
@endsection()