@extends('layouts.admin')
@section('title')Категория {{$category->title}}@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$category->title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    <div>
        <form action="{{route('admin.categories.store')}}" method="post" id="addNew">
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <x-alert type="danger" :message="$error"></x-alert>
                @endforeach
            @endif
            <div class="form-group">
                <label for="name">Название</label>
                <input id="name" class="form-control" type="text" name="name" placeholder="name" value="{{$category->title}}"><br/>
                <label for="preview">Изображение</label>
                <input id="preview" class="form-control" name="preview" type="file" value="{{$category->image}}"><br/>
                <label for="description">Описание</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" value="{{ $category->description }}">{{ $category->description }}</textarea><br/>
            </div>
        </form>
    </div>
@endsection
