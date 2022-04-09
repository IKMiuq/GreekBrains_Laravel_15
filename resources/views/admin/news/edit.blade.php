@extends('layouts.admin')
@section('title')Новость {{$news->title}}@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$news->title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    <div>
        <form action="{{route('admin.news.store')}}" method="post" id="addNew">
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <x-alert type="danger" :message="$error"></x-alert>
                @endforeach
            @endif
            <div class="form-group">
                <label for="name">Название</label>
                <input id="name" class="form-control" type="text" name="name" placeholder="name" value="{{$news->title}}"><br/>
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status) == 'draft') selected @endif value="draft">Draft</option>
                    <option @if($news->status) == 'active') selected @endif value="active">Active</option>
                    <option @if($news->status) == 'blocked') selected @endif value="blocked">Blocked</option>
                </select><br/>
                <label for="author">Автор</label>
                <input id="author" class="form-control" type="text" name="author" placeholder="author" value="{{$news->author}}"><br/>
                <label for="preview">Изображение</label>
                <input id="preview" class="form-control" name="preview" type="file" value="{{$news->image}}"><br/>
                <label for="description">Описание</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" value="{{ $news->description }}">{{ $news->description }}</textarea><br/>
            </div>
        </form>
    </div>
@endsection
