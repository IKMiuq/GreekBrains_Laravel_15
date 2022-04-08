@extends('layouts.admin')
@section('title')Админ панель@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Админ панель</h1>
    </div>
    <div>
        <p class='ta-center'>Форма авторизации</p>
        <form action="auth">
            <input type="text" name="login" placeholder="login"><br/>
            <input type="text" name="password" placeholder="password"><br/>
            <button>Авторизоваться</button>
        </form>
    </div>

@endsection
