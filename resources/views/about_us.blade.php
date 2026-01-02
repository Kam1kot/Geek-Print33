@extends('layouts.header')
@section('main-content')
        {{-- Блок о нас --}}
        <div class="mt-4 p-4 d-flex justify-content-center flex-column gap-3 ab-us">
            <section class="content-wrapper">
                <div class="text-center">
                    <h2 class="fs-2 fw-medium">Чем мы занимаемся?</h2>
                </div>
                <div class="content-inner">
                    <div class="about-us position-relative">
                        <img class="aboutus-collage" loading="lazy" src="{{ asset('imgs/technical/about-us-collage-1.jpg') }}" alt="">
                        <div class="text-center about-us-text position-relative z-3">
                            <p>Мы специализируемся на 3D-печати и 3D-моделировании. Создаём физические объекты по цифровым чертежам, а также помогаем воплотить ваши идеи в реальность.</p>
                            <p class="my-2 fs-5">Выполняем печать:</p>
                            <ul class="mb-4">
                                <li class="text-start">* по готовым 3D-моделям;</li>
                                <li class="text-start">* по вашим чертежам и эскизам с нуля;</li>
                                <li class="text-start">* по физическим образцам — воссоздание и точное копирование деталей.</li>
                            </ul>
                            <p class="mb-4">Мы используем высокоточные принтеры и качественные материалы, что позволяет получать надёжные и эстетичные изделия любой сложности.</p>
                            <p>Обращайтесь — вместе мы создадим то, что ещё вчера было лишь идеей!</p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center mt-2 mb-2 fade-in">
                <h2 class="mt-5 mb-1 fs-2 fw-medium">Почему именно мы?</h2>
            </div>
            <section class="content-wrapper">
                <div class="content-inner">
                    <p class="fade-in">Обрабатываем каждый заказ с заботой и ответственностью.</p>
                    <div class="why-we mt-4 d-flex flex-column">
                        <div class="mb-4 fade-in">
                            <div class="name d-flex align-items-center gap-3 fw-bold">
                                <i class="fa-solid fa-fire"></i>
                                <p class="fs-4">Индивидуальный подход</p>
                            </div>
                            <p class="ms-3">Вникаем в задачу, дорабатываем модель, работаем на результат.</p>
                        </div>
                        <div class="mb-4 fade-in">
                            <div class="name d-flex align-items-center gap-3 fw-bold">
                                <i class="fa-solid fa-key"></i>
                                <p class="fs-4">Печать под ключ</p>
                            </div>
                            <p class="ms-3">От идеи и чертежа до готовой детали.</p>
                        </div>
                        <div class="mb-4 fade-in">
                            <div class="name d-flex align-items-center gap-3 fw-bold">
                                <i class="fa-solid fa-eye"></i>
                                <p class="fs-4">Визуальный контроль</p>
                            </div>
                            <p class="ms-3">При необходимости согласовываем внешний вид модели и финального изделия.</p>
                        </div>
                        <div class="mb-4 fade-in">
                            <div class="name d-flex align-items-center gap-3 fw-bold">
                                <i class="fa-solid fa-clock"></i>
                                <p class="fs-4">Прозрачные сроки</p>
                            </div>
                            <p class="ms-3">Всегда честно называем сроки и соблюдаем их.</p>
                        </div>
                        <div class="mb-4 fade-in">
                            <div class="name d-flex align-items-center gap-3 fw-bold">
                                <i class="fa-solid fa-palette"></i>
                                <p class="fs-4">Опыт и креатив</p>
                            </div>
                            <p class="ms-3">Берёмся за нестандартные решения, любим сложные проекты.</p>
                        </div>
                        <div class="mb-4 fade-in">
                            <div class="name d-flex align-items-center gap-3 fw-bold">
                                <i class="fa-solid fa-boxes-packing"></i>
                                <p class="fs-4">Надёжная упаковка и доставка</p>
                            </div>
                            <p class="ms-3">Всё приедет в целости и сохранности.</p>
                        </div>
                        <div class="mb-4 fade-in">
                            <div class="name d-flex align-items-center gap-3 fw-bold">
                                <i class="fa-solid fa-fire"></i>
                                <p class="fs-4">Работаем с душой</p>
                            </div>
                            <p class="ms-3">Нам важно не просто сделать, а воплотить вашу идею, чтобы вы остались довольны и пришли снова.</p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center mt-2 mb-2">
                <h2 class="mt-5 mb-1 fs-2 fw-medium fade-in">Мы в других соцсетях</h2>
            </div>
            <section class="content-wrapper">
                <div class="content-inner ">
                    <div class="socials fade-in">
                        <a target="_blank" href="https://www.avito.ru/brands/ec8aea67ae5ca40fae709aa9d2e61c68/all?gdlkerfdnwq=101&page_from=from_item_card_icon&iid=7418041963&sellerId=82e5de2636ff05c30924d46394c6060f" title="Авито Geek-Print33" class="d-flex align-items-center gap-2">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="10.595" cy="5.225" r="3.325" fill="#965EEB"></circle><circle cx="22.245" cy="7.235" r="7.235" fill="#0AF"></circle><circle cx="8.9" cy="18.6" r="8.9" fill="#04E061"></circle><circle cx="24.325" cy="21.005" r="5.375" fill="#FF4053"></circle></svg>
                            <svg width="79" height="30" viewBox="0 0 79 30" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M11.36.62 2 25.06h5.03l1.92-5.1h9.94l1.93 5.1h4.99L16.5.62h-5.15Zm-.68 14.85 3.27-8.6 3.25 8.6h-6.52Zm21.14 3.29L27.76 7.89h-4.8l6.54 17.17h4.75L40.69 7.9h-4.8l-4.06 10.87Zm14.9-10.87h-4.57v17.17h4.56V7.9Zm-2.3-1.24a3.33 3.33 0 1 0 0-6.65 3.33 3.33 0 0 0 0 6.65Zm11.34-3.34H51.2v4.55h-2.67V12h2.67v7.3c0 4.13 2.28 5.92 5.49 5.92a7.86 7.86 0 0 0 3.15-.62v-4.26c-.54.2-1.11.3-1.7.31-1.39 0-2.4-.54-2.4-2.4V12h4.1V7.9h-4.1V3.31Zm13.7 4.27a8.9 8.9 0 0 0-8.23 5.49 8.9 8.9 0 0 0 0 6.8 8.9 8.9 0 0 0 4.8 4.83 8.9 8.9 0 0 0 3.41.68 8.9 8.9 0 0 0 6.24-15.16 8.9 8.9 0 0 0-6.23-2.64Zm0 13.24a4.33 4.33 0 0 1-4.26-5.17 4.33 4.33 0 0 1 7.85-1.57 4.33 4.33 0 0 1 .73 2.41 4.32 4.32 0 0 1-4.33 4.32v.01Z"></path></svg>
                        </a>
                        <a href="https://vk.com/3dprinter33" target="_blank" class="vk-svg">
                            <svg width="136" height="30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#new_logo_vk_with_text__a)"><g clip-path="url(#new_logo_vk_with_text__b)"><path fill-rule="evenodd" clip-rule="evenodd" d="M67 12.5c0 3.34-2.43 5.5-5.88 5.5-3.45 0-5.88-2.16-5.88-5.5S57.67 7 61.12 7C64.57 7 67 9.16 67 12.5Zm-9.22 0c0 2.07 1.35 3.5 3.34 3.5s3.34-1.43 3.34-3.5-1.35-3.45-3.34-3.45-3.34 1.38-3.34 3.45Zm-17.03-.21c.95-.44 1.56-1.18 1.56-2.33 0-1.73-1.58-2.96-3.87-2.96h-5.27v11h5.5c2.37 0 4.02-1.29 4.02-3.05 0-1.33-.87-2.32-1.94-2.66ZM35.6 9.01h2.83c.85 0 1.44.5 1.44 1.2s-.6 1.2-1.44 1.2h-2.83V9ZM38.67 16h-3.06V13.3h3.06c.96 0 1.59.55 1.59 1.36 0 .8-.63 1.33-1.59 1.33ZM51.84 18h3.19l-5.06-5.71L54.61 7h-2.9l-3.68 4.27h-.6V7H45v11h2.44v-4.38h.59l3.8 4.38ZM76.47 7v4.34h-4.93V7H69.1v11h2.43v-4.44h4.93V18h2.43V7h-2.43ZM86.9 18h-2.44V9.22h-3.8V7H90.7v2.22h-3.8V18Zm9.7-11c-2.14 0-4.02.89-4.57 2.8l2.24.37a2.38 2.38 0 0 1 2.2-1.25c1.33 0 2.12.9 2.22 2.33h-2.37c-3.23 0-4.84 1.42-4.84 3.45 0 2.05 1.59 3.3 3.83 3.3 1.8 0 3-.82 3.53-1.73l.5 1.73h1.8v-6.18c0-3.19-1.73-4.82-4.54-4.82Zm-.72 9.16c-1.19 0-1.95-.61-1.95-1.57 0-.84.62-1.43 2.48-1.43h2.3c0 1.8-1.14 3-2.83 3ZM113.73 18h-3.2l-3.8-4.38h-.6V18h-2.42V7h2.43v4.27h.59L110.4 7h2.9l-4.63 5.29 5.05 5.71Zm4.27 0h2.44V9.22h3.8V7H114.2v2.22h3.8V18Zm12.3-11c3.33 0 5.7 2.2 5.7 5.37 0 .3-.02.55-.04.79h-8.84c.23 1.69 1.46 2.83 3.32 2.83 1.29 0 2.3-.55 2.83-1.33l2.29.38c-.83 2.1-2.98 2.96-5.27 2.96-3.34 0-5.71-2.18-5.71-5.5s2.37-5.5 5.71-5.5Zm3.06 4.25A3.06 3.06 0 0 0 130.29 9a3 3 0 0 0-3.02 2.25h6.09Z" fill="currentColor"></path><path d="M11.5 24h1c5.44 0 8.15 0 9.83-1.68C24 20.64 24 17.92 24 12.5v-1.02c0-5.4 0-8.12-1.67-9.8C20.65 0 17.93 0 12.5 0h-1C6.06 0 3.35 0 1.67 1.68 0 3.36 0 6.08 0 11.5v1.02c0 5.4 0 8.12 1.68 9.8C3.36 24 6.08 24 11.5 24Z" fill="#07F"></path><path d="M12.77 17.29c-5.47 0-8.59-3.75-8.72-9.99h2.74c.09 4.58 2.11 6.52 3.71 6.92V7.3h2.58v3.95c1.58-.17 3.24-1.97 3.8-3.95h2.58a7.62 7.62 0 0 1-3.51 4.98 7.9 7.9 0 0 1 4.11 5.01h-2.84a4.94 4.94 0 0 0-4.14-3.57v3.57h-.31Z" fill="#fff"></path></g></g><defs><clipPath id="new_logo_vk_with_text__a"><path fill="#fff" transform="translate(.001)" d="M0 0h136v24H0z"></path></clipPath><clipPath id="new_logo_vk_with_text__b"><path fill="#fff" transform="translate(0 -12)" d="M0 0h136v48H0z"></path></clipPath></defs></svg>
                        </a>
                    </div>
                </div>
            </section>
        </div>
@endsection