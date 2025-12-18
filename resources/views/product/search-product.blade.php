<li class="search-product__wrapper">
    <a href="${link}">
        <div class="d-flex align-items-center justify-content-between">
            <div class="search-product__img-wrapper">
                <img src="{{ asset('imgs/products/shark.jpg') }}" alt="${item.title}">
            </div>
        </div>
        <div class="search-product__details d-flex align-items-centert text-start">
            <div class="name fw-bold">
                <p>${item.title}</p>
            </div>
            <div class="category">
                <p>${item.title}</p>
            </div>
        </div>
        <div class="search-product__price fw-bold"><p>${item.price} ₽</p></div>
    </a>
</li>