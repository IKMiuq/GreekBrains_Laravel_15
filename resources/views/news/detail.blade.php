@extends('layouts.main')
@section('title'){{ $newsDetail->id }}@endsection
@section('description')Вы на детальной странице новости {{ $newsDetail->title }}@endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="conteiner">
        <div class="row">
            <h3 class="title">{{ $newsDetail->title }}</h3>
            <img src="{{ $newsDetail->image }}">
            <br>
            <p><em>{{$newsDetail->status}}: {{$newsDetail->author}}</em></p>
            <p>{{$newsDetail->description}}</p>
        </div>
    </div>
@endsection
