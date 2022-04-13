@extends('layouts.main')
@section('title')Новостные разделы@endsection
@section('description')Вы на странице с новостными разделами@endsection
@section('content')
    <div class="row">
        @foreach ($category as $section)
            <div class="card-body row">
                <div class="col-2" style="background-image: url('{{ $section->image }}'); background-repeat: no-repeat; background-size: contain;">
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $section->title }}</text>
                    </svg>
                </div>

                <div class="card shadow-sm col-10 py-4">
                    <p class="card-text">{{ $section->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            @if($section->news_count >0)
                            <a href="{{route('news.sections', ['section' => $section->id])}}" type="button" class="btn btn-sm btn-outline-secondary">Перейти -></a>
                            @endif
                        </div>
                        <small class="text-muted">Всего новостей: {{$section->news_count}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
