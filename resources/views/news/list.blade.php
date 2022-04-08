@extends('layouts.main')
@section('title')Новости@endsection
@section('description')Вы на странице раздела@endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($newsAll as $news)
            <div class="col">
                <div class="card shadow-sm">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                         src="{{ $news['image'] }}"/>
                    <div class="card-body">
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $news['title'] }}</text>
                        <p class="card-text">{{ $news['discription'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('news.detail', ['section' => $news['section_id'], 'news_id' => $news['id']])}}" type="button"
                                   class="btn btn-sm btn-outline-secondary">Перейти -></a>
                            </div>
                            <p><em>{{$news['status']}}: {{$news['author']}}</em></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
