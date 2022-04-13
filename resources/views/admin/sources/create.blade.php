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
        <form action="{{route('admin.source.store')}}" method="post" id="addNew">
            @csrf
            @include('inc.massages')
            <div class="form-group">
                <label for="category_id">Код</label>
                <input id="title" class="form-control @if($errors->has('code')) alert-danger @endif" type="text" name="title" placeholder="title" value="{{old('name')}}"><br/><br/>
            </div>
            <div class="form-group">
                <label for="title">URL</label>
                <input id="title" class="form-control @if($errors->has('url')) alert-danger @endif" type="text" name="title" placeholder="title" value="{{old('name')}}"><br/>
            </div>
        </form>
    </div>
@endsection
