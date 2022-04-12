<x-main.header></x-main.header>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">@section('title')Главная страница@show</h1>
                <p class="lead text-muted">@section('description')Вы на главной странице сайта@show</p>
                <p>
                    <a href="{{route('login.')}}" class="btn btn-primary my-2">Страница авторизации</a>
                    <a href="{{route('news.')}}" class="btn btn-secondary my-2">Новости</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            @yield('content')
        </div>
    </div>

</main>

<x-main.footer></x-main.footer>
