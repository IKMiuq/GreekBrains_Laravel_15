<?php
/**
 * @var array $Data
 */

echo View::make('includes/header');
?>
    <div class="conteiner">
        <div class="row">
            <h3 class="title">{{ $newsDetail['title'] }}</h3>
            <img src="{{ $newsDetail['image'] }}">
            <br>
            <p><em>{{$newsDetail['status']}}: {{$newsDetail['author']}}</em></p>
            <p>{{$newsDetail['discription']}}</p>
        </div>
    </div>
<?php
echo View::make('includes/footer');
