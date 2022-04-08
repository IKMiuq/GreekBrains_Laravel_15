<?php
/**
 * @var array $Data
 */

echo View::make('includes/header');
?>
<div class="conteiner">
@foreach ($newsSection as $section)
    <div class="row">
        <a href="/news/{{$section['id']}}"><h3 class="title">{{ $section['title'] }}</h3></a>
        <img src="{{ $section['image'] }}">
        <br>
        <p>{{$section['discription']}}</p>
    </div>
    <br>
@endforeach
</div>
<?php

echo View::make('includes/footer');
