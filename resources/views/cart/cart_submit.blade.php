@extends('layouts.header')
@section('main-content')
<section class="content-wrapper">
    <div class="content-inner submit-cart-wrapper">
        <div class="w-100 text-start mt-4 mb-3">
            <h2 class="fs-3 fw-medium">Оформление заказа</h2>
        </div>
        <div class="w-100">
            <hr>
            {{-- <nav class="mt-2" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Каталог</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cart.index')}}">Корзина</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span style="cursor: pointer;">Оформление корзины</span></li>
                </ol>
            </nav> --}}
        </div>
        <div class="submit-wrapper mt-3 w-100">
            {{-- {{ route('cart.checkout') }} --}}
            <form action="{{ route('cart.checkout') }}" method="post"> 
                @csrf
                <div class="customer-details">
                    <h3 class="mb-1">Детали о заказчике</h3>
                    <div class="cstmr-det">
                        <div class="first-name">
                            <label for="first-name">Имя *</label>
                            <input value="{{ old('first_name') }}" maxlength="10" placeholder="Иванушка" type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="last-name">
                            <label for="last-name">Фамилия *</label>
                            <input value="{{ old('last_name') }}" maxlength="36" placeholder="Иванушечков" type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="customer-tel">
                            <label for="phone">Телефон *</label>
                            <input type="tel"
                                value="{{ old('phone') }}"
                                name="phone"
                                class="form-control" 
                                placeholder="8 (___) ___ - __ - __"
                                autocomplete="tel"
                                required> 
                        </div>
                    </div>
                    {{-- <h3 class="mt-5 mb-1">Адресс доставки</h3>
                    <div class="cstmr-det">
                        <div class="city">
                            <label for="city">Город *</label>
                            <input maxlength="20" placeholder="Москва" type="text" name="city" class="form-control" required>
                        </div>
                        <div class="street">
                            <label for="street">Улица, дом, квартира *</label>
                            <input maxlength="50" placeholder="ул. Пушкина, д. X, кв. Y" type="text" name="street" class="form-control" required>
                        </div>
                        <div class="index">
                            <label for="index">Индекс *</label>
                            <input placeholder="123456" type="number" name="index" class="form-control" required>
                        </div>
                    </div> --}}
                    <h3 class="mt-5 mb-1">Нюансы</h3>
                    <div class="cstmr-det">
                        <div class="comment">
                            <label for="comment">Комментарий</label>
                            <textarea maxlength="500" name="comment" placeholder="Ваш комментарий к заказу. Пожелания насчет заказа и т.д.">{{ old('comment') }}</textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="checkbox" name="privacy_accept" required>
                        Я согласен на обработку персональных данных
                        (<a href="{{ route('main.privacy') }}" target="_blank">Политика конфиденциальности</a>)
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert mt-2 alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- <div class="mb-3">
                    <label>ФИО</label>
                    <input type="text" name="name" class="form-control" required>
                </div> --}}
                <div class="w-100 mt-3 d-flex justify-content-end submit-cart">
                    <button type="submit">Оформить заказ</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection