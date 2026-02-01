<article class="aproduct">
    <div class="img-wrapper">
        <a href="{{ route('products.show',['product' => $product->id]) }}">
            <img src="{{ asset('storage/' . $product->mainImage->path) }}"
                alt="{{ $product->title }}"
                class="product-card__image">
        </a>
    </div>
    <div class="aproduct-info">
        <div class="title-wrapper">
            <h2>{{ $product->title }}</h2>
        </div>
        <div class="description-wrapper">
            <h3>{{ $product->description }}</h3>
        </div>
    </div>
    
    <div class="price-wrapper">
        <p>{{ $product->price }} <span style="color:gray;">₽</span></p>
    </div>
    <div class="actions">

    </div>
</article>