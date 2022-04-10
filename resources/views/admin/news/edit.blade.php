@extends('layouts.admin')
@section('title')Редактировать новость {{$news->title}}@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$news->title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a id="saveForm" type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    <div>
        <form action="{{route('admin.news.update', ['news' => $news->id])}}" method="post" id="addNew">
            @csrf
            @method('put')
            @include('inc.massages')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option @if($category->id == $news->category_id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select><br/>
            </div>
            <div class="form-group">
                <label for="title">Название</label>
                <input id="title" class="form-control @if($errors->has('title')) alert-danger @endif" type="text" name="title" placeholder="title" value="{{$news->title}}"><br/>
                @error('title') <strong class="text-danger">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status == 'DRAFT') selected @endif value="DRAFT">Draft</option>
                    <option @if($news->status == 'ACTIVE') selected @endif value="ACTIVE">Active</option>
                    <option @if($news->status == 'BLOCKED') selected @endif value="BLOCKED">Blocked</option>
                </select><br/>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input id="author" class="form-control @if($errors->has('author')) alert-danger @endif" type="text" name="author" placeholder="author" value="{{$news->author}}"><br/>
                @error('author') <strong class="text-danger">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="preview">Изображение</label>
                <input id="preview" class="form-control" name="preview" type="file" value="{{$news->image}}"><br/>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" value="{{ $news->description }}">{{ $news->description }}</textarea><br/>
            </div>
        </form>
    </div>
@endsection
