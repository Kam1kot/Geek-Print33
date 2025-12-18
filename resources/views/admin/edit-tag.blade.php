@extends('layouts.admin-header')
@section('main-content')
<section class="content-wrapper manage-categories">
    <div class="content-inner">
        <div class="w-100 p-4 d-flex gap-3">
            <div class="form-wrapper">
                <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <h3>Редактирование тега</h3>

                    {{-- Название категории --}}
                    <div class="mb-3">
                        <label class="form-label">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $tag->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Кнопки --}}
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection