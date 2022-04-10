@extends('layouts.admin')
@section('title')Новая категория@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новая категория</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a id="saveForm" type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    <div>
        <form action="{{route('admin.categories.store')}}" method="post" id="addNew">
            @csrf
            @include('inc.massages')
            <div class="form-group">
                <label for="title">Название</label>
                <input id="title" class="form-control" type="text" name="title" placeholder="title" value="{{old('title')}}"><br/>
                <label for="preview">Изображение</label>
                <input id="preview" class="form-control" name="preview" type="file" value="{{old('file')}}"><br/>
                <label for="description">Описание</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" value="{{ old('description') }}">{{ old('description') }}</textarea><br/>
            </div>
        </form>
    </div>
@endsection
