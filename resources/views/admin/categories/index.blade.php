@extends('layouts.admin')
@section('title')Категории новостей@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('admin.categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <th>{{$category->title}}</th>
                    <th>{{$category->description}}</th>
                    <th>
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}">Ред.</a>
                        &nbsp;
                        <a class="text-danger" href="{{route('admin.categories.delete', ['id' => $category->id])}}">Уд.</a>
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
@endsection
