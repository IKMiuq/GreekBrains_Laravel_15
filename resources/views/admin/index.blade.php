<?php
/**
 * @var array $Data
*/

echo View::make('includes/header');

?>
<div>
    <p class='ta-center'>Форма авторизации</p>
    <form action="auth">
        <input type="text" name="login" placeholder="login"><br/>
        <input type="text" name="password" placeholder="password"><br/>
        <button>Авторизоваться</button>
    </form>
</div>
<?php

echo View::make('includes/footer');
