<div class="container">
@foreach($data as $link)
    <div class="col">
        <a href="{{$link->url}}">{{$link->code}}</a>
        <a class="link-secondary" href="{{route('admin.sources.update', ['code' => $link->code])}}" aria-label="Add a new report">
            <i class="fa fa-refresh" aria-hidden="true"></i>
        </a>
    </div>
@endforeach
@error('error') <strong class="text-danger">{{ $message }}</strong> @enderror
@error('success') <strong class="text-danger">{{ $message }}</strong> @enderror
    <br>
<div class="col mt-3">
    <form id="addSource" action="{{route('admin.sources.store')}}" type="post">
        @csrf
        @include('inc.massages')
        <!-- form elements -->
        <div class="form-group d-flex">
            <p>Добавить группу</p>
            <a class="link-secondary link-danger" onclick="document.getElementById('addSource').submit()">
                <span data-feather="plus-circle"></span>
            </a>
        </div>
        <div class="form-group">
            <label for="code">Код новости - уникальный</label>
            <input id="code" class="form-control @if($errors->has('title')) alert-danger @endif" type="text" name="code" placeholder="code" value="{{ old('code') }}"><br/>
            @error('code') <strong class="text-danger">{{ $message }}</strong> @enderror
        </div>
        <div class="form-group">
            <label for="url">Ссылка RSS на источник</label>
            <input id="url" class="form-control @if($errors->has('title')) alert-danger @endif" type="text" name="url" placeholder="url" value="{{ old('url') }}"><br/>
            @error('url') <strong class="text-danger">{{ $message }}</strong> @enderror
        </div>
    </form>
</div>
</div>
