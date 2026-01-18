@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper delivery">
        <div class="content-inner">
            <div class="text-center mb-2">
                <h2 class="fs-1 fw-medium">Доставка и оплата</h2>
            </div>
            <div class="text-block position-relative mt-4 mb-5 fade-in">
                <h2 class="fs-2 position-absolute ms-2 fw-bold"><i class="fa-solid fa-comment"></i> Как оформить заказ</h2>
                <p class="mt-3">На сайте нет онлайн-оплаты — это сделано для вашей <b>безопасности</b>.</p>
                <p>После оформления заказа с вами свяжется наш менеджер: уточнит состав, сроки и наличие позиций.</p>
                <p>Пластиковые детали изготавливаются строго под заказ — обычно это занимает <b>1–2 рабочих дня</b> .</p>
                <br />
                <p>Для связи мы используем <b>WhatsApp</b>, <b>Telegram</b> или <b>VK</b> — указывайте номер, привязанный к мессенджеру.</p>
                <p>Как только заказ будет готов — мы пришлём вам фото готовых деталей.</p>
            </div>

            <div class="text-block position-relative my-5 fade-in">
                <h2 class="fs-2 position-absolute ms-2 fw-bold"><i class="fa-solid fa-money-check-dollar"></i> Оплата</h2>
                <p>Мы используем оплату <b>переводом</b> или по <b>QR-коду через СБП</b> — это быстро и без комиссии для вас.</p>
                <p>Вам придёт QR-код, вы сканируете его в приложении банка (можно из галереи, если скрин прислали в WhatsApp).</p>
                <p>Получатель платежа — <b>XX XXXXXXX XX</b>. Проверяйте сумму перед оплатой.</p>

                <h3 class="mt-4 fs-4 fw-bold" style="color: #e67e22">Почему не онлайн-эквайринг?</h3>
                <p>Комиссия платёжных систем доходит до <b>3,5%</b> — и это закладывается в цену.</p>
                <p>При оплате по QR-коду комиссия всего <b>0,7%</b>, и это позволяет не поднимать цены.</p>
            </div>

            <div class="text-block position-relative my-5 fade-in">
                <h2 class="fs-2 position-absolute ms-2 fw-bold"><i class="fa-solid fa-truck"></i> Доставка</h2>
                <p>Оплатить доставку можно вместе с заказом или при получении — уточните заранее.</p>
                <p>Можем отправить <b>Почтой России</b> или другой транспортной компанией — обсудим индивидуально.</p>
            </div>
        </div>
    </section>
@endsection