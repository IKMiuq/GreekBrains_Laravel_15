@extends('layouts.admin')
@section('title')Новая новость@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новая новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    <div>
        <form action="auth">
            <input type="text" name="name" placeholder="name"><br/>
            <input type="text" name="status" placeholder="status"><br/>
            <input type="text" name="author" placeholder="author"><br/>
            <input type="file"><br/>
            <textarea name="description" id="" cols="30" rows="10"></textarea><br/>
        </form>
    </div>
@endsection
