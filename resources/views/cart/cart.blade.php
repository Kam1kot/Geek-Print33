@extends('layouts.header')
@section('main-content')
<section class="content-wrapper site-cart">
        <div class="content-inner">
            <div class="text-center cart mb-5">
                <h2 class="fs-1 fw-medium">Ваша корзина</h2>
            </div>
            <hr class="w-100 border border-secondary border-2 opacity-50">
            @if ($agent->isMobile())
                <div class="content-inner__items">
                    @if ($items_cart->count()>0)
                        <div class="cart-grid">
                            @foreach ($items_cart as $item)
                                <article class="cart-item">
                                    <div class="img-box">
                                        <img src="{{ asset('imgs/products/shark.jpg') }}" alt="{{ $item->name }}">
                                    </div>
                                    <div class="info">
                                        <h3>{{ $item->name }}</h3>
                                        <p class="price">{{ $item->price }} ₽</p>

                                        <div class="qty">
                                            <form method="post" action="{{ route('cart.qty.decrease', ['rowId' => $item->rowId])}}">
                                                @csrf
                                                @method('PUT')
                                                <button class="qty-control__btn qty-control__btn--minus">-</button>
                                            </form>
                                            <span>{{ $item->qty }}</span>
                                            <form method="post" action="{{ route('cart.qty.increase', ['rowId' => $item->rowId])}}">
                                                @csrf
                                                @method('PUT')
                                                <button class="qty-control__btn qty-control__btn--plus">+</button>
                                            </form>
                                        </div>

                                        <form method="post" action="{{ route('cart.item.remove', ['rowId' => $item->rowId])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="remove-cart"><i class="fa-solid fa-xmark"></i></button>
                                        </form>
                                        
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="cart-footer">
                            <div class="total">
                                <div>
                                    <span>Итого:</span>
                                    <strong>{{ Cart::instance('cart')->subtotal() }} ₽</strong>
                                </div>
                                <form action="{{ route('cart.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-light">Очистить корзину</button>
                                </form>
                            </div>
                            <div class="submit">
                                <a href="{{ route('cart.submit.order') }}">Оформить заказ</a>
                            </div>
                        </div>
                        <div class="cart-footer-placeholder"></div>
                    @else
                        {{-- Пустая корзина --}}
                        <div class="shopping-cart__empty">
                            <p class="shopping-cart__empty-text">Ваша корзина пуста :(</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Перейти к покупкам</a>
                        </div>
                    @endif
                </div>
            @else
                <div class="content-inner__items">
                    @if ($items_cart->count()>0)
                        <div class="shopping-cart__table-wrapper">
                            {{-- Таблица товаров --}}
                            <div>
                                <table class="shopping-cart__table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Продукт</th>
                                            <th>Цена</th>
                                            <th>Количество</th>
                                            <th>Сумма</th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        @foreach ($items_cart as $item)
                                            <tr class="shopping-cart__row" id="product_{{ $item->id }}">
                                                {{-- Изображение --}}
                                                <td class="shopping-cart__cell-img">
                                                    <img src="{{asset('imgs/products')}}/{{$item->model->image}}"
                                                        alt="{{ $item->name }}"
                                                        width="120"
                                                        height="120"
                                                        loading="lazy">
                                                </td>
        
                                                {{-- Название --}}
                                                <td class="shopping-cart__cell-info">
                                                    <h4 class="shopping-cart__title">{{ $item->name }}</h4>
                                                    <ul class="shopping-cart__options">
                                                        <li></li>{{-- сюда можно вывести атрибуты (размер, цвет и т.д.) --}}
                                                    </ul>   
                                                </td>
        
                                                {{-- Цена --}}
                                                <td class="shopping-cart__cell-price">
                                                    <span class="shopping-cart__price">{{ $item->price }} ₽</span>
                                                </td>
        
                                                {{-- Количество --}}
                                                <td class="shopping-cart__cell-qty">
                                                    <div class="qty-control">
                                                        <form method="post" action="{{ route('cart.qty.decrease', ['rowId' => $item->rowId])}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="qty-control__btn qty-control__btn--minus">−</button>
                                                        </form>
        
                                                        <input type="number"
                                                            value="{{ $item->qty }}"
                                                            min="1"
                                                            class="qty-control__number"
                                                            readonly>
        
                                                        <form method="post" action="{{ route('cart.qty.increase', ['rowId' => $item->rowId])}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="qty-control__btn qty-control__btn--plus">+</button>
                                                        </form>
                                                    </div>
                                                </td>
        
                                                {{-- Сабтотал --}}
                                                <td class="shopping-cart__cell-subtotal">
                                                    <span class="shopping-cart__subtotal">{{ $item->subTotal() }} ₽</span>
                                                </td>
        
                                                <td>
                                                    <form method="post" action="{{ route('cart.item.remove', ['rowId' => $item->rowId])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="remove-cart"><i class="fa-solid fa-xmark"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart__actions-wrapper">
                                <div class="cart__actions-inner">
                                    <div class="clear-cart">
                                        <form action="{{ route('cart.destroy') }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light">Очистить корзину</button>
                                        </form>
                                    </div>
                                    <div class="submit-cart">
                                        <a href="{{ route('cart.submit.order') }}">Оформить заказ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        {{-- Итоговая панель --}}
                        <div class="shopping-cart__totals-wrapper">
                            <div class="shopping-cart__totals">
                                <h3 class="shopping-cart__totals-title">Итоговая стоимость</h3>

                                <table class="cart-totals">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Сумма</th>
                                            <td>{{ Cart::instance('cart')->subtotal() }} ₽</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Доставка</th>
                                            <td>Бесплатно</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Итог</th>
                                            <td><strong>{{ Cart::instance('cart')->subtotal() }} ₽</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        {{-- Пустая корзина --}}
                        <div class="shopping-cart__empty">
                            <p class="shopping-cart__empty-text">Ваша корзина пуста :(</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Перейти к покупкам</a>
                        </div>
                    @endif
                </div>
            @endif
        </div>
        <script>
            document.addEventListener('DOMContentLoaded',()=>{
                const footerPanel = document.querySelector('.cart-footer');
                const placeholder = document.querySelector('.cart-footer-placeholder');
                const siteFooter  = document.querySelector('footer');

                if (!footerPanel || !placeholder || !siteFooter) return;

                function toggleFixed(){
                    const needFixed = siteFooter.getBoundingClientRect().top > window.innerHeight;

                    footerPanel.classList.toggle('fixed-bottom', needFixed);
                    placeholder.classList.toggle('active',       needFixed);
                    placeholder.style.height = footerPanel.offsetHeight + 'px';
                }
                window.addEventListener('scroll', toggleFixed, {passive:true});
                toggleFixed();
            })
        </script>
</section>
@endsection()