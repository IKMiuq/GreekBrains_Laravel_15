@extends('layouts.admin')
@section('title')Пользователи@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пользователи</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a id="saveForm" type="button" class="btn btn-sm btn-outline-secondary">Сохранить</a>
            </div>
        </div>
    </div>
    @include('inc.massages')
    <div class="table-responsive">
        <form action="{{route('admin.users.update')}}" method="post" id="addNew">
            @csrf
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>Админ</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <th>{{$user->id}}<input name='users[{{$user->id}}][id]' class="d-none" type="text" value="{{$user->id}}"></th>
                        <th>{{$user->name}}</th>
                        <th><input name='users[{{$user->id}}][is_admin]' type="checkbox" @if($user->is_admin) checked @endif></th>
                        <th>                        &nbsp;
                            <a class="text-danger" href="{{route('admin.users.delete', ['id' => $user->id])}}">Уд.</a>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Записей нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </form>
        {{$users->links()}}
    </div>
@endsection
