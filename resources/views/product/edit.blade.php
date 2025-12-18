@extends('layouts.admin-header')
@section('main-content')
    <section class="content-wrapper">
        <div class="content-inner edit">
            <div class="text-center mb-5">
                <h2 class="fs-2 fw-medium">Редактирование товара</h2>
            </div>
            <div class="form-wrapper mb-5">
                <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label class="form-label">Название</label>
                        <input value="{{ $product->title }}" type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Категория</label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $c)
                            <option value="{{ $c->id }}"
                                {{ $c->id == $product->category_id ? 'selected' : '' }}>
                                {{ $c->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Теги</label>
                        <select name="tags[]" class="form-select" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ $product->tags->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Ctrl+click — выбрать несколько</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Краткое описание</label>
                        <textarea name="description" class="form-control" rows="2">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Цена</label>
                        <input value="{{ $product->price }}"type="text" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3 image">
                        <label class="form-label">Главное изображение</label>

                        @if($imageUrl)
                            <div class="mb-2">
                                <img loading="lazy" src="{{ $imageUrl }}" id="currentImg" style="max-width:250px;display:block;">
                            </div>
                        @endif

                        <input type="file"
                            name="image"
                            id="mainFile"
                            accept="image/jpeg,image/jpg,image/png,image/webp">

                        <div class="mt-2 d-none" id="previewWrap">
                            <img id="previewImg" style="max-width:100%;display:block;">
                        </div>

                        <button type="button" id="cropBtn" class="btn btn-sm btn-outline-success mt-2 d-none">
                            Обрезать
                        </button>

                        <div class="form-text">jpg, jpeg, png, webp ≤ 3 МБ, мин. 600×400</div>
                        <div class="invalid-feedback" id="mainErr"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Сохранить</button>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <script src="{{ asset('js/product-crop.js') }}"></script>
@endsection