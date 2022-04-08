<?php
/**
 * @var array $Data
 */

echo View::make('includes/header');
?>
<div class="conteiner">
@foreach ($newsAll as $news)
    <div class="row">
        <a href="/news/{{$news['section_id']}}/{{$news['id']}}"><h3 class="title">{{ $news['title'] }}</h3></a>
        <img src="{{ $news['image'] }}">
        <br>
        <p><em>{{$news['status']}}: {{$news['author']}}</em></p>
        <p>{{$news['discription']}}</p>
    </div>
    <br>
@endforeach
</div>
<?php
echo 'News';

echo View::make('includes/footer');
