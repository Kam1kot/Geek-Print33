@extends('layouts.header')
@section('main-content')
    <section class="content-wrapper">
        <div class="content-inner">
            Создание
            <form method="post" action="{{ route('products.store') }}">
                @csrf
                <div class="">
                    <label for="title">Название</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="">
                    <label for="price">Цена</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                </div>
                <div class="">
                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="image" class="form-control" required>
                </div>
                <input type="number" name="sold" hidden value="0" required>
                <button class="btn btn-primary" type="submit">Создать товар</button>
            </form>
        </div>
    </section>
@endsection