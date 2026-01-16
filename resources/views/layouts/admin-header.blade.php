<!doctype html>
 <html lang="ru">
    <head> 
        <meta charset="utf-8"> 
        <title>{{ config('app.name') }} | {{ $title ?? '' }}</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
            .indie-flower-regular {
            font-family: "Indie Flower", cursive;
            font-weight: 400;
            font-style: normal;
            }
        </style>

        {{-- AdminLTE --}} 
        <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}"> 
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> 
        {{-- Иконки --}} 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"> 
        {{-- Кроппер --}} 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" rel="stylesheet"> 
    </head> 
    <body class="admin">
        <div class="app-wrapper">

            @include('admin.sidebar')

            <main class="app-main">
                @yield('main-content')
            </main>

        </div> 
        <script src="{{ asset('js/adminlte.js') }}"></script>
        <script src="{{ asset('js/sidebar-resize.js') }}"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script> 
    </body> 
</html>