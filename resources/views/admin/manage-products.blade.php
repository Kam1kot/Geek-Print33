@extends('layouts.admin-header') 
@section('main-content') 
<section class="admin-products"> 
    <div class="d-flex justify-content-between"> 
        <header class="admin-header-bar"> 
            <h1>Управление товарами</h1> 
        </header> 
        <button id="sidebarToggle" class="sidebar-toggle-btn"> 
            <i class="fa-solid fa-align-justify"></i> 
        </button> 
    </div> 
    <div class="admin-products-grid"> 
        {{-- Форма --}} 
        <aside class="product-form"> 
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="productForm"> 
                @csrf 
                <h3>Создание товара</h3> 
                <div class="mb-3"> 
                    <label class="form-label">Название</label> 
                    <input type="text" name="title" class="form-control" required> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label">Категория</label> 
                    <select name="category_id" class="form-select" required> 
                        @foreach($categories as $c) 
                        <option value="{{ $c->id }}">{{ $c->title }}</option> 
                        @endforeach 
                    </select> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label">Теги</label> 
                    <select name="tags[]" class="form-select" multiple> 
                        @foreach($tags as $tag) 
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option> 
                        @endforeach 
                    </select> 
                    <div class="form-text">Ctrl+click — выбрать несколько</div> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label">Краткое описание</label> 
                    <textarea name="description" class="form-control" rows="2"></textarea> 
                </div> 
                <div class="mb-3"> 
                    <label class="form-label">Цена</label> 
                    <input type="text" name="price" class="form-control" required> 
                </div> 
                <div class="mb-1 image"> 
                    <label class="form-label">Главное изображение</label> 
                    <input type="file" name="image" id="mainFile" accept="image/jpeg,image/jpg,image/png,image/webp" required> 
                    <!-- превью --> 
                    <div class="mt-2 d-none" id="previewWrap"> 
                        <img id="previewImg" style="max-width: 100%; display: block;"> 
                    </div> <!-- кнопка обрезки --> 
                    <button type="button" id="cropBtn" class="btn btn-sm btn-outline-success mt-2 d-none"> Обрезать </button> 
                    <div class="form-text">jpg, jpeg, png, webp ≤ 3 МБ, мин. 600×400</div> 
                    <div class="invalid-feedback" id="mainErr"></div> 
                </div> 
                <button type="submit" class="btn btn-save" id="saveBtn">Сохранить</button> 
            </form> 
        </aside> {{-- Список товаров --}} 
        <main class="product-list"> 
            <div class="list-header"> 
                <h3>Список товаров</h3> 
                <div class="search-box"> 
                    <input type="text" placeholder="Поиск…" id="liveSearch"> 
                    <div id="searchDrop" class="search-drop"></div> 
                </div> 
            </div> 
            <div class="product-table"> 
                @foreach($products as $product) 
                <div class="product-row" data-product-id="{{ $product->id }}" id="row-{{ $product->id }}"> 
                    <div class="product-main"> <img src="{{ asset('imgs/products/shark.jpg') }}"> 
                        <div>
                            <div class="product-main">
                                <span class="muted">ID: {{ $product->id }}</span>
                            </div>
                            <strong class="product-title">{{ $product->title }}</strong> 
                            <div class="muted">{{ $product->category->title ?? '-' }}</div> 
                        </div> 
                    </div> 
                    <div class="product-meta"> 
                        <span>{{ number_format($product->price,2,',',' ') }} ₽</span> 
                        <div class="tags"> 
                            @foreach($product->tags as $tag) 
                            <span class="tag">{{ $tag->title }}</span> 
                            @endforeach 
                        </div> 
                    </div> 
                    <div class="product-actions"> 
                        <a href="{{ route('products.edit',$product->id) }}">✏️</a> 
                        <form action="{{ route('products.delete',$product->id) }}" method="POST"> 
                            @csrf 
                            @method('DELETE') 
                            <button>🗑️</button> 
                        </form> 
                    </div> 
                </div> 
                @endforeach 
            </div> 
            <div class="pagination"> {{ $products->links('admin.custom-pagination') }} </div> 
        </main> 
    </div> 
</section> 
<script src="{{ asset('js/product-crop.js') }}"></script> 
<script src="{{ asset('js/admin-s.js') }}"></script> 
@endsection