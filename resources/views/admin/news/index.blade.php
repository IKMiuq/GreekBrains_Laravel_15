@extends('layouts.admin')
@section('title')Новости@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.news.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    @include('inc.massages')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Статус</th>
                <th>Описание</th>
                <th>Последнее изменение</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $new)
                <tr>
                    <th>{{$new->id}}</th>
                    <th>{{$new->category->title}}</th>
                    <th>{{$new->title}}</th>
                    <th>{{$new->status}}</th>
                    <th>{{$new->description}}</th>
                    <th>@if($new->updated_at) {{$new->updated_at->format('d-m-Y H:i')}} @endif</th>
                    <th>
                        <a href="{{route('admin.news.edit', ['news' => $new->id])}}">Ред.</a>
                        &nbsp;
                        <a class="text-danger" href="{{route('admin.news.delete', ['id' => $new->id])}}">Уд.</a>
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{$news->links()}}
    <h3>Скачать новости</h3>
    <form action="{{route('admin.news.download')}}" method="post">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <div class="form-group">
            <label for="count">Число новостей</label>
            <input id="count" class="form-control" type="text" name="count" placeholder="count" value="{{old('count')}}"><br/>
            <button class="btn btn-primary my-2">Скачать</button>
        </div>
    </form>
@endsection
