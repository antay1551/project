<?php
    session_start();
    require_once 'php/User.php';
    $user = new User($_SESSION['id_user']);
    $user->connect();
?>
<!DOCTYPE html>
<htlm>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="keywords" content="text, site, website"/>
        <meta name="description" content="about what">
        <link href = "css/style.css" rel="stylesheet" type="text/css"/>
        <link href= "img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <title>site</title>
    </head>
    <body>
    <div id="page-wrap">
        <header>
            <a href="index.html" title="На главную"id="logo">Test-Site</a>
            <span class="contact">
					<a href="about.html" title="Информация о нас">О нас</a>
				</span>
            <input type="text" class="field" placeholder="Давай помогу найти"/>
            <span class="right">
				<span class="contact">
					<a href="reg.html">Регистрация</a>
				</span>
				<span class="contact">
					<a href="auth.html" title="Войти">Вход</a>
				</span>
            </span>
        </header>
        <div class="clear"><br/></div>
        <center>
            <div id="menu">Разделы<hr/></div>
            <div id="menuHrefs">
                <a href="about.html">О нас</a>
                <a href="feedback.html">Обратная связь</a>
                <a href="news.html">Новости</a>
                <a href="new.html">Новинки</a>
            </div>
        </center>
        <div id="wrapper">
            <div id="articles">
                <form action="php/UserController.php" class="form" method="post">
                    <div class="form__field">
                        <label for="name">Your name:</label>
                        <input type="text" name="name"  value="<?php print($user->get_name());?>" placeholder="Имя*" required/>
                    </div>
                    <div class="form__field">
                        <label for="email">Your email</label>
                        <input type="email" name="email" value="<?php print($user->get_email());?>" placeholder="E-Mail"/>
                    </div>
                    <div class="form__field">
                        <label for="phone">Your phone</label>
                        <input type="phone" name="phone" placeholder="Телефон" value="<?php print($user->get_phone());?>" minlength="10" maxlength="15"/>
                    </div>
                    <div class="form__field">
                        <label for="password">Your password</label>
                        <input type="password" name="password" value="<?php print($user->get_password());?>" placeholder="password" minlength="6"/>
                    </div>
                    <input type="hidden" name="change">
                    <input type="submit" value="Сохранить" id="send" name="send"/>
                </form>
            </div>

        </div>
    </div>
    <footer>
        <span class="left">Все права защищены &copy; 2017</span>
        <span class="right"><a href="https://vk.com/antay1551"><img src="img/vk.jpg" alt="" ></a></span>
    </footer>
    </body>


</htlm>