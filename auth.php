<?php
session_start();
print($_SESSION['id_user']);
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
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" placeholder="E-Mail"/>
                    </div>
                    <div class="form__field">
                        <label for="subject">password</label>
                        <input type="password" name="password" id="password" placeholder="password" minlength="6"/>
                    </div>
                    <input type="hidden" name="login">
                    <input type="submit" value="Отправить" id="send" name="send"/>
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