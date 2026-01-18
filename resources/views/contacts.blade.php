@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper">
        <div class="content-inner">
            <div class="text-center mt-2 mb-2">
                <h2 class="mt-4 mb-4 fs-2 fw-medium fade-in">Связаться с нами</h2>
            </div>
            <div class="text-block position-relative mt-4 mb-5 fade-in">
                <h2 class="fs-2 position-absolute ms-2 fw-bold"><i class="fa-solid fa-phone-volume"></i></i> Контакты</h2>
                <p class="mt-3">Вы сможете связаться с нами используя следующие ресурсы.</p>
                <br />
                <div class="my-2">
                    <h3 class="fs-3 fw-bold mb-3" style="color: #e67e22">E-mail</h3>
                    <p class="ms-3 email-tag" onclick="copyText(this)">Geek-print33@yandex.ru</p>
                </div>
                <br>
                <div class="my-2">
                    <h3 class="fs-3 fw-bold mb-3" style="color: #e67e22">Мессенджер</h3>
                    <a class="ms-3" href="https://vk.com/im/convo/810995763?entrypoint=recent_searches" target="_blank">Вконтакте</a>
                </div>
                <br>
                <div class="my-2">
                    <h3 class="fs-3 fw-bold mb-3" style="color: #e67e22">Другое</h3>
                    <a class="ms-3" href="https://www.avito.ru/brands/ec8aea67ae5ca40fae709aa9d2e61c68/all?gdlkerfdnwq=101&page_from=from_item_card_icon&iid=7418041963&sellerId=aff763e9337a99bf147965ad9404e9c5" target="_blank">Авито</a>
                </div>
            </div>
        </div>
    </section>
@endsection