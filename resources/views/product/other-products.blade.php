<a class="swiper-slide banner-wrapper" href="{{ route('products.show',['product' => $product->id]) }}">
    <div class="op-wrapper position-relative">
        <div class="op-img">
            <img src="{{ Storage::url($product->image) }}" alt="">
        </div>
        <div class="op-details d-flex flex-column align-items-center mt-1">
            <h2>{{ $product->title }}</h2>
        </div>
        <p class="mt-2 mb-1">{{ $product->price }} ₽</p>
        <div class="op-actions">
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
                <a href="{{ route('cart.index') }}" class="product-card__added-to-cart fw-bold"><i class="fa-solid fa-cart-shopping"></i></i> Добавлен</a>
            @else
            <form id="addToCart" class="addToCart-form" method="post" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="title" value="{{ $product->title }}">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="price" value="{{ $product->price }}">

                <button type="submit" class="product-card__add-to-cart fw-bold">
                    <i class="fa-solid fa-cart-plus"></i></i> В корзину
                </button>
            </form>
            @endif
        </div>
    </div>
</a>