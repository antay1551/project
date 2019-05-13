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
                    <span class="contact">
					    <a href="recipe.php">Добавить рецепт</a>
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
                <form action="php/RecipeController.php" class="form" method="post">
                    <div class="form__field">
                        <label for="name">name</label>
                        <input type="text" name="name" placeholder="Имя*" required/>
                    </div>

                    <div id="new_chq"></div>
                    <input type="hidden" value="0" id="total_chq">
                    <input type="submit" value="Отправить" id="send" name="send"/>
                </form>
            </div>
        </div>
<script>
    var count;
    function add(){
        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        if ( typeof(count) === 'undefined') {
            count = new_chq_no;
        } else {
            count++;
        }
        console.log(count);
        var input = document.createElement("input");
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'new_id');
        
        console.log(input);
        document.getElementById("new_chq").appendChild(input);
        var input = document.createElement("input");
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'new_id');
        console.log(input);
        document.getElementById("new_chq").appendChild(input);
        // document.getElementById("new_chq").innerHTML  = "<br>";
    }
</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <button onclick="add()">Add</button>
    </div>
    <footer>
        <span class="left">Все права защищены &copy; 2019</span>
        <span class="right"><a href="https://vk.com/antay1551"><img src="img/vk.jpg" alt=""></a></span>
    </footer>
    </body>
</htlm>