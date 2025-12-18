@extends('layouts.admin-header')
@section('main-content')
    <section class="content-wrapper manage-products">
        <div class="content-inner">
            <div class="w-100 p-4 d-flex gap-3">
                <div class="form-wrapper">
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
                        <div class="mb-3 image">
                            <label class="form-label">Главное изображение</label>
                            <input type="file" name="image" id="mainFile"
                                    accept="image/jpeg,image/jpg,image/png,image/webp" required>
    
                            <!-- превью -->
                            <div class="mt-2 d-none" id="previewWrap">
                                <img id="previewImg" style="max-width: 100%; display: block;">
                            </div>
    
                            <!-- кнопка обрезки -->
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
                <div class="aproduct-list-wrapper">
                    <div class="text-start mt-2">
                        <h2 class="fs-2 fw-medium">Список товаров</h2>
                    </div>
                    <div class="aproduct-list">
                        <div class="position-relative mb-3" style="max-width:320px;">
                            <input type="text" id="liveSearch" class="form-control" placeholder="Быстрый поиск по названию…" autocomplete="off">
                            <div id="searchDrop" class="search-drop"></div>
                        </div>
                        <div class="admin-table-wrapper">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th colspan="2">Название</th>
                                        <th>Цена</th>
                                        <th>Категория</th>
                                        <th>Тэги</th>
                                        <th>Действия</th>
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
                                                    /* если нужно чуть дольше подсветить: */
                                                    setTimeout(()=>row.classList.remove('highlight'),2000);
                                                }
                                            });
                                        </script>
                                    @endif
                                    @foreach ($products as $product)
                                        <tr data-product-id="{{ $product->id }}"
                                            id="row-{{ $product->id }}"
                                            class="{{ $product->id == $highlight ? 'highlight' : '' }}">
                                            <td>{{ $product->id }}</td>
                                            <td><img src="{{ asset('imgs/products/shark.jpg') }}" alt="{{ $product->title }}"></td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ number_format($product->price, 2, ',', ' ') }} ₽</td>
                                            <td>{{ $product->category->title ?? '-' }}</td>
                                            <td class="tags">
                                                @foreach ($product->tags as $tag)
                                                    <span class="tag product-card__tag">{{ $tag->title }}</span>
                                                @endforeach
                                            </td>
                                            <td >
                                                <div class="actions">
                                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">✏️ Редактировать</a>
                                                    <form action="{{ route('products.delete',$product->id) }}" method="POST" style="display:inline;">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">🗑️ Удалить</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination-wrapper">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script type="module" src="{{ asset('js/product-crop.js') }}"></script>
    @endpush
@endsection