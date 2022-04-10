@extends('layouts.admin')
@section('title')Новая новость@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новая новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a id="saveForm" type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    <div>
        <form action="{{route('admin.news.store')}}" method="post" id="addNew">
            @csrf
            @include('inc.massages')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option @if($category->id == 'category_id') selected @endif value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select><br/>
                <label for="title">Название</label>
                <input id="title" class="form-control" type="text" name="title" placeholder="title" value="{{old('name')}}"><br/>
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') == 'DRAFT') selected @endif value="DRAFT">Draft</option>
                    <option @if(old('status') == 'ACTIVE') selected @endif value="ACTIVE">Active</option>
                    <option @if(old('status') == 'BLOCKED') selected @endif value="BLOCKED">Blocked</option>
                </select><br/>
                <label for="author">Автор</label>
                <input id="author" class="form-control" type="text" name="author" placeholder="author" value="{{old('author')}}"><br/>
                <label for="image">Изображение</label>
                <input id="image" class="form-control" name="image" type="image" value="{{old('file')}}"><br/>
                <label for="description">Описание</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" value="{{ old('description') }}">{{ old('description') }}</textarea><br/>
            </div>
        </form>
    </div>
@endsection
