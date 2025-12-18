@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper site-wishlist">
        <div class="content-inner">
            <div class="text-center mt-2 mb-5">
                <h2 class="fs-1 wishlist fw-medium">Список избранного</h2>
            </div>
            <hr class="w-100 border border-secondary border-2 opacity-50">
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
                                            {{-- Изображение --}}
                                            <td class="shopping-wishlist__cell-img">
                                                <img src="{{asset('imgs/products')}}/{{$item->model->image}}"
                                                    alt="{{ $item->name }}"
                                                    width="120"
                                                    height="120"
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
                                                <form id="addToCart" class="addToCart-form" method="post" action="{{ route('cart.add') }}">
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
        </div>
    </section>
@endsection()