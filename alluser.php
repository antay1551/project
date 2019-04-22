<?php
session_start();
require_once 'php/User.php';

if(isset($_POST["showAllUser"])){
    $user = new User($_SESSION["id_user"]);
    $idFridge = $_POST["showAllUser"];
    $allUsers = $user->showAllUser($_POST);
}
?>
<!DOCTYPE html>
<htlm>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="keywords" content="text, site, website"/>
        <meta name="description" content="about what">
        <link href="css/styleFridge.css" rel="stylesheet" type="text/css"/>
        <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <title>site</title>
    </head>
    <body>
    <div id="page-wrap">
        <header>
            <a href="index.php" title="На главную" id="logo">Test-Site</a>
            <span class="contact">
					<a href="about.html" title="Информация о нас">О нас</a>
				</span>
            <input type="text" class="field" placeholder="Давай помогу найти"/>
            <span class="right">
                <?php if (isset($_SESSION["id_user"])) { ?>
                    <span class="contact">
					    <a href="addfridge.php">Добавть холодильник</a>
				    </span>
                    <span class="contact">
					    <a href="php/Test.php">Мой кабинет</a>
				    </span>
                    <span class="contact">
					    <a href="php/LogOut.php">Выход</a>
				    </span>
                <?php } else { ?>
                    <span class="contact">
					<a href="register.html">Регистрация</a>
				</span>
                    <span class="contact">
					<a href="auth.php" title="Войти">Вход</a>
				</span>
                <?php } ?>
			   </span>

        </header>
        <div class="clear"><br/></div>
        <center>
            <div id="menu">Разделы
                <hr/>
            </div>
            <div id="menuHrefs">
                <a href="about.html">О нас</a>
                <a href="feedback.html">Обратная связь</a>
                <a href="news.html">Новости</a>
                <a href="new.html">Новинки</a>
            </div>
        </center>
        <?php
            if(isset($allUsers)) {
                echo '<table cellpadding="0" cellspacing="0" border="2">';
                echo '<tr><th>id</th><th>role</th><th>email</th></tr>';
                for ($i = 0; $i < count($allUsers); $i++) {
                    echo '<tr>';
                    foreach ($allUsers[$i] as $key => $value) {
                        if ($key == "id") {
                            if($allUsers[$i]["role"] != "admin") {
                                $id = $allUsers[$i]["id"];
                                echo "<td><a href='php/UserController.php?idUser=$id&idFridge=$idFridge'><img src='/img/delete.png'></a></td>";
                            } else {
                                echo '<td></td>';
                            }
                        } else {
                            echo '<td>', $value, '</td>';
                        }
                    }
                    echo '</tr>';
                }
                echo '</table><br />';
            }
        ?>
    </div>

    <footer>
        <span class="left">Все права защищены &copy; 2019</span>
        <span class="right"><a href="https://vk.com/antay1551"><img src="img/vk.jpg" alt=""></a></span>
    </footer>
    </body>
</htlm>