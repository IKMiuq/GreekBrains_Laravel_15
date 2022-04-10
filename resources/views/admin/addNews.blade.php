<?php
/**
 * @var array $Data
 */

echo View::make('includes/header');

?>
<div>
    <p class='ta-center'>Новая новость</p>
    <form action="auth">
        <input type="text" name="name" placeholder="name"><br/>
        <input type="text" name="status" placeholder="status"><br/>
        <input type="text" name="author" placeholder="author"><br/>
        <input type="file"><br/>
        <textarea name="description" id="" cols="30" rows="10"></textarea><br/>

        <button>Добавить</button>
    </form>
</div>
<?php

echo View::make('includes/footer');
