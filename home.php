<?php
    session_start();
    require_once 'php/Fridge.php';
    $fridge = new Fridge($_SESSION['id_user']);
    $alFridge = $fridge->connect();
    require_once 'php/Product.php';

?>
<!DOCTYPE html>
<htlm>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="keywords" content="text, site, website"/>
        <meta name="description" content="about what">
        <link href="css/styleHome.css" rel="stylesheet" type="text/css"/>
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
        <form action="php/FridgeController.php" method="POST">
            <div class="form__field">
                <label for="email">Product</label>
                <input type="text" name="product" placeholder="Type product"/>
            </div>
            <br><br><br>
            <?php for($i = 0; $i < count($alFridge); $i++){ ?>
            <input type="checkbox" name="fridge<?php print($i);?>" value="<?php print($alFridge[$i]['id']);?>"> <?php print($alFridge[$i]["name_fridge"]); ?><br>
            <?php } ?>
            <input type="hidden" name="findProduct">
            <input type="submit" value="Поиск" id="send" name="send"/>
        </form>
        <?php
        if (isset($_SESSION["product"])) {
            $information = $_SESSION["product"][1];
            echo '<table cellpadding="0" cellspacing="0" border="2">';
            echo '<tr><th>count</th><th>date_start</th><th>date_finish</th><th>name fridge</th></tr>';
            for ($i = 0; $i < count($information); $i++) {
                echo '<tr>';
                foreach ($information[$i] as $key => $value) {
                    echo '<td>', $value, '</td>';
                }
                echo '</tr>';
            }
            echo '</table><br />';
            unset($_SESSION["product"]);
        }
        ?>
            <div id="wrapper">
                <div id="articles">
                    <?php for($i = 0; $i < count($alFridge); $i++){ ?>
                    <article>
                        <img src="<?php print('/img/'.$alFridge[$i]["img"]); ?>" alt="size" title="size">
                        <h2><?php print($alFridge[$i]["name_fridge"]); ?></h2>
                        <a href="fridge.php?id=<?php print($alFridge[$i]['id']);?>">Открыть холодильник</a>
                    </article>
                    <?php } ?>
                </div>
            </div>
    </div>
    <footer>
        <span class="left">Все права защищены &copy; 2019</span>
        <span class="right"><a href="https://vk.com/antay1551"><img src="img/vk.jpg" alt=""></a></span>
    </footer>
    </body>
</htlm>