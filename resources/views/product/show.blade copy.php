@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper">
        <div class="content-inner">
            <div class="product-details mt-5">
                <div class="product-details__img">
                    <img loading="lazy" src="{{ asset('imgs/products/shark.jpg') }}" alt="">
                </div>
                <div class="product-details__details">
                    <div>
                        <h2 class="fs-3">{{ $product->title }}</h2>
                        <h3 class="fs-5">{{ $product->category->title }}</h3>
                    </div>

                    <p class="fs-3">{{ $product->price }} ₽</p>

                    <div class="d-flex align-items-center gap-3">
                        @if (Cart::instance('cart')->content()->where('id',$product->id)->count()>0)
                            <a class="product-card__added-to-cart" href="{{ route('cart.index') }}">Добавлен</a>
                        @else
                            <form class="d-flex align-items-center gap-3" id="addToCart" method="post" action="{{ route('cart.add') }}">
                                @csrf
                                <div class="qty-control">
                                    <button id="qtyProductMinus" class="qty-control__btn qty-control__btn--minus">−</button>
                                    <input
                                        id="qtyProductValue" 
                                        type="number"
                                        name="quantity"
                                        value="1"
                                        min="1"
                                        class="qty-control__number">
                                    <button id="qtyProductPlus" class="qty-control__btn qty-control__btn--plus">+</button>
                                </div>
                                <div>
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="title" value="{{ $product->title }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
    
                                    <button type="submit" class="product-card__add-to-cart fw-bold">
                                        <i class="fa-solid fa-cart-plus"></i></i> В корзину
                                    </button>
                                </div>
                            </form>
                        @endif
                        @if (Cart::instance('wishlist')->content()->where('id',$product->id)->count()>0)
                            <a class="product-card__heart" href="{{ route('wishlist.index') }}"><i class="fa-solid fa-heart text-danger"></i></a>
                        @else
                            <form id="addToWishlist" class="addToCart-form" method="post" action="{{ route('wishlist.add') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="title" value="{{ $product->title }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <button type="submit" class="product-card__heart fw-bold">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-75 mt-5 mb-3">
                <hr>
            </div>
        </div>
        
        <div class="content-inner">
            <div class="w-75 d-flex flex-column gap-2">
                <h3 class="fw-bold fs-4">Описание</h3>
                <p>{{ $product->description }}</p>
            </div>
        </div>

        @if (\App\Models\Product::all()->count()>1)
            <div class="content-inner other-products mt-5">
                <div class="w-75 text-start fs-5">
                    <p>Другие товары</p>
                </div>
                <div class="other-prds w-100 mb-5">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($products_other->shuffle()->take(4) as $product)
                                @include('product.other-products', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="content-inner">
                <div class="no-items d-flex flex-column align-items-center">
                    <p>К сожалению список остальных товаров пуст :(</p>
                    <p>Мы скоро добавим новые товары!</p>
                </div>
            </div>
        @endif
    </section>

    <script>
        const btnPlus = document.getElementById('qtyProductPlus');
        const btnMinus = document.getElementById('qtyProductMinus');
        const inputValue = document.getElementById('qtyProductValue');

        btnPlus.addEventListener('click', function(e)  {
            e.preventDefault()
            inputValue.value = Math.max(1, +inputValue.value + 1);
        });

        btnMinus.addEventListener('click', function(e) {
            e.preventDefault()
            inputValue.value = Math.max(1, +inputValue.value - 1);
        });
    </script>
@endsection