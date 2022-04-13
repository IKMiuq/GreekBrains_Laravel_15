@extends('layouts.admin')
@section('title')Редактировать категорию {{$category->title}}@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$category->title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a id="saveForm" type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    <div>
        <form action="{{route('admin.categories.update',['category' => $category])}}" method="post" id="addNew">
            @csrf
            @method('put')
            @include('inc.massages')
            <div class="form-group">
                <label for="title">Название</label>
                <input id="title" class="form-control @if($errors->has('title')) alert-danger @endif" type="text" name="title" placeholder="title" value="{{$category->title}}"><br/>
                @error('title') <strong class="text-danger">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="preview">Изображение</label>
                <input id="preview" class="form-control" name="preview" type="file" value="{{$category->image}}"><br/>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" class="form-control @if($errors->has('description')) alert-danger @endif" id="description" cols="30" rows="10" value="{{ $category->description }}">{{ $category->description }}</textarea><br/>
                @error('description') <strong class="text-danger">{{ $message }}</strong> @enderror
            </div>
        </form>
    </div>
@endsection
