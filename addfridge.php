<?php
session_start();
?>
<!DOCTYPE html>
<htlm>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="keywords" content="text, site, website"/>
        <meta name="description" content="about what">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
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
        <div id="wrapper">
            <div id="articles">
                <h2>Add fridge</h2>
                <form action="php/FridgeController.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="form__field">
                        <label for="name">name fridge:</label>
                        <input type="text" name="name" placeholder="Имя*" required/>
                    </div>
                    <div class="form__field">
                        <label for="date">Last razm</label>
                        <input type="date" name="date" required/>
                    </div>
                    <div class="form__field">
                        <label for="">Img</label>
                        <input type="file" name="file" id="img_send" required/>
                    </div>
                    <input type="hidden" name="addfridge">
                    <input type="submit" value="Сохранить" id="send" name="send"/>
                </form>
            </div>
        </div>
        <?php
        print($_SESSION["id_user"])
        ?>
    </div>
    <footer>
        <span class="left">Все права защищены &copy; 2017</span>
        <span class="right"><a href="https://vk.com/antay1551"><img src="img/vk.jpg" alt=""></a></span>
    </footer>
    </body>
</htlm>