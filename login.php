<?php
session_start();
print($_SESSION['id_user']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
    <meta charset="UTF-8">
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<form action="php/UserController.php" class="form" method="post">
    <div class="form__field">
        <input type="email" name="email" placeholder="E-Mail"/>
        <span class="form__error">Это поле должно содержать E-Mail в формате example@site.com</span>
    </div>
    <div class="form__field">
        <input type="password" name="password" placeholder="password" minlength="6"/>
        <span class="form__error">Пароль должен содержать больше 6 символов</span>
    </div>
    <input type="hidden" name="login">
    <button type="submit">Отправить</button>
</form>
</body>
</html>