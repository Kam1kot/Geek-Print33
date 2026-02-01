@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper site-wishlist">
        <div class="content-inner">
            <div class="text-center mt-2 mb-5">
                <h2 class="fs-1 wishlist fw-medium">Список избранного</h2>
            </div>
            <hr class="w-100 border border-secondary border-2 opacity-50">
            @if ($agent->isMobile())
                <div class="content-inner__items">
                    @if ($items_wishlist->count()>0)
                        <div class="cart-grid">
                            @foreach ($items_wishlist as $item)
                                <article class="cart-item">
                                    @php
                                        $product = $item->model;
                                        $imageUrl = $product && $product->mainImage 
                                            ? Storage::url($product->mainImage->path) 
                                            : asset('imgs/technical/no-cover.png');
                                    @endphp
                                    <div class="img-box">
                                        <img src="{{ $imageUrl}}" alt="{{ $item->name }}">
                                    </div>
                                    <div class="info">
                                        <h3>{{ $item->name }}</h3>
                                        <p class="price">{{ $item->price }} ₽</p>

                                        <div class="wishlist-tel__actions">
                                            @if(Cart::instance('cart')->content()->where('id',$item->id)->count()>0)
                                                <a href="{{ route('cart.index') }}" class="product-card__added-to-cart fw-bold"><i class="fa-solid fa-cart-shopping"></i></i><span>Уже добавлен</span></a>
                                            @else
                                            <form id="addToCart" class="addToCart-form" method="post" action="{{ route('cart.add.from.wishlist',['rowId' => $item->rowId]) }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="hidden" name="title" value="{{ $item->name }}">
                                                <input type="hidden" name="price" value="{{ $item->price }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="product-card__add-to-cart fw-bold">
                                                    <i class="fa-solid fa-cart-plus"></i></i><span>В корзину</span>
                                                </button>
                                            </form>
                                            @endif

                                            <form method="post" action="{{ route('wishlist.item.remove', ['rowId' => $item->rowId])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="remove-cart"><i class="fa-solid fa-xmark"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="clear-wishlist w-100 text-center">
                            <form action="{{ route('wishlist.destroy') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-light">Очистить избранное</button>
                            </form>
                        </div>
                    @else
                        {{-- Нет избранных товаров --}}
                        <div class="shopping-wishlist__empty">
                            <p class="shopping-wishlist__empty-text">Список избранных товаров пуст :(</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Перейти к просмотру</a>
                        </div>
                    @endif
                </div>
            @else
                <div class="content-inner__items">
                    @if ($items_wishlist->count()>0)
                        <div class="shopping-wishlist__table-wrapper">
                            {{-- Таблица товаров --}}
                            <div>
                                <table class="shopping-wishlist__table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Название</th>
                                            <th>Цена</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        @foreach ($items_wishlist as $item)
                                            <tr class="shopping-wishlist__row" id="product_{{ $item->id }}">
                                                @php
                                                    $product = $item->model;
                                                    $imageUrl = $product && $product->mainImage 
                                                        ? Storage::url($product->mainImage->path) 
                                                        : asset('imgs/technical/no-cover.png');
                                                @endphp
                                                {{-- Изображение --}}
                                                <td class="shopping-wishlist__cell-img">
                                                    <img src="{{ $imageUrl }}"
                                                        alt="{{ $item->name }}"
                                                        loading="lazy">
                                                </td>
        
                                                {{-- Название --}}
                                                <td class="shopping-wishlist__cell-info">
                                                    <h4 class="shopping-wishlist__title">{{ $item->name }}</h4>
                                                    <ul class="shopping-wishlist__options">
                                                        <li></li>{{-- сюда можно вывести атрибуты (размер, цвет и т.д.) --}}
                                                    </ul>   
                                                </td>
        
                                                {{-- Цена --}}
                                                <td class="shopping-wishlist__cell-price">
                                                    <span class="shopping-wishlist__price">{{ $item->price }}</span>
                                                </td>
                                                
                                                {{-- Опции --}}
                                                {{-- Добавить в корзину --}}
                                                <td>
                                                    @if(Cart::instance('cart')->content()->where('id',$item->id)->count()>0)
                                                        <a href="{{ route('cart.index') }}" class="product-card__added-to-cart fw-bold"><i class="fa-solid fa-cart-shopping"></i></i>Уже добавлен</a>
                                                    @else
                                                    <form id="addToCart" class="addToCart-form" method="post" action="{{ route('cart.add.from.wishlist',['rowId' => $item->rowId]) }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="title" value="{{ $item->name }}">
                                                        <input type="hidden" name="price" value="{{ $item->price }}">
                                                        <button type="submit" class="product-card__add-to-cart fw-bold">
                                                            <i class="fa-solid fa-cart-plus"></i></i> В корзину
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                                {{-- Убрать --}}
                                                <td>
                                                    <form method="post" action="{{ route('wishlist.item.remove', ['rowId' => $item->rowId])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="remove-wishlist"><i class="fa-solid fa-xmark"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="clear-wishlist">
                                <form action="{{ route('wishlist.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-light">Очистить избранное</button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Нет избранных товаров --}}
                        <div class="shopping-wishlist__empty">
                            <p class="shopping-wishlist__empty-text">Список избранных товаров пуст :(</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Перейти к просмотру</a>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>
@endsection()