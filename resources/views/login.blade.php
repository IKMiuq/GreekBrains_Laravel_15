@extends('layouts.main')
@section('title')Форма авторизации@endsection
@section('description')Заполните форму@endsection
@section('content')
    <p class='ta-center'>Форма авторизации</p>
    <form action="{{route('login.in')}}" method="post">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <div class="form-group">
            <label for="login">Логин</label>
            <input id="login" class="form-control" type="text" name="login" placeholder="login" value="{{old('login')}}"><br/>
            <label for="password">Пароль</label>
            <input id="password" class="form-control" type="text" name="password" placeholder="password" value="{{old('password')}}"><br/>
            <button class="btn btn-primary my-2">Авторизоваться</button>
        </div>
    </form>
@endsection
