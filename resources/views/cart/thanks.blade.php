@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper order-thanks">
        <div class="content-inner mt-5">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="rgb(92, 153, 0)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="rgb(92, 153, 0)" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>

            <h2 class="my-3">Спасибо за покупку!</h2>

            <div class="thanks-text my-5">
                <p>Ваш заказ отправлен специалусту.</p>
                <p><b>В скором времени он с вами свяжется</b> для согласования состава товаров по вашему заказу.</p>
                <p>Все наши детали делаются под заказ. Срок изготовления составляет <b>1-2 дня.</b></p>
            </div>

            <a class="mb-3" href="{{ route('products.index') }}">Вернуться на главную</a>
        </div>
    </section>
@endsection