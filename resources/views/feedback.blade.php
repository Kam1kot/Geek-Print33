@extends('layouts.header')
@section('main-content')
    <div class="content-wrapper feedback">
        <div class="content-inner">
            @if(session('success'))
                <p style="color:green;">
                    {{ session('success') }}
                </p>
            @endif
            <h2>Обратная связь</h2>
            <form action="{{ route('feedback.send') }}" method="POST">
                @csrf
                
                <div class="form-lab">
                    <label>Тема</label>
                    <input type="text" name="title" required>
                </div>
                
                <div class="feedback-info">
                    <div class="form-lab">
                        <label>Ваше имя:</label>
                        <input type="text" name="name" required>
                    </div>
    
                    <div class="form-lab">
                        <label>Email:</label>
                        <input type="email" name="email" required>
                    </div>
                </div>
                
                <div class="form-lab">
                    <label>Сообщение:</label>
                    <textarea name="message" required></textarea>
                </div>
                <div class="w-100 text-end p-3">
                    <button type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection