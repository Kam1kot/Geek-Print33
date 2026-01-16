<div class="product-card d-flex flex-column" id="product_{{ $product->id }}">
    {{-- изображение --}}
    <a href="{{ route('products.show',['product' => $product->id]) }}">
        <img src="{{ asset('imgs/products/shark.jpg') }}"
             alt="{{ $product->title }}"
             class="product-card__image">
    </a>
    
    {{-- название --}}
    <a href='{{ route('products.show',['product' => $product->id]) }}' class="product-card__title fw-bold">{{ $product->title }}</a>
    <p class="product-card__category mb-2">{{ $product->category->title }}</p>
    
    {{-- описание (макс. 3 строки) --}}
    <div class="product-card__description-wrapper">
        <p class="product-card__description mb-2">
            {{ $product->description }}
        </p>
    </div>

    {{-- теги --}}
    <div class="product-card__tags">
        @foreach ($product->tags as $tag)
            <span class="product-card__tag">{{ $tag->title }}</span>
        @endforeach
    </div>

    {{-- цена и кнопки «прижаты» к низу --}}
    <div class="mt-auto">
        <div class="product-card__actions">
            <div class="product-card__price">
                <span class="product-card__price-value fw-bold">{{ $product->price }} ₽</span>
            </div>
            <div class="product-card__btns">
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
                @if(Cart::instance('cart')->content()->where('id',$product->id)->count()>0)
                    <a href="{{ route('cart.index') }}" class="product-card__added-to-cart fw-bold"><i class="fa-solid fa-cart-shopping"></i></i><span>Добавлен</span></a>
                @else
                <form id="addToCart" class="addToCart-form" method="post" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="title" value="{{ $product->title }}">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <button type="submit" class="product-card__add-to-cart fw-bold">
                        <i class="fa-solid fa-cart-plus"></i></i> <span>В корзину</span>
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>