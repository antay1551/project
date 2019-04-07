<?php
session_start();
require_once 'php/Fridge.php';
$fridge = new Fridge($_SESSION['id_user']);
$allProducts = $fridge->getProducts();
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
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            print($id);
        }
        ?>

        <button class="open-button" onclick="openForm()">Open Form</button>
        <button class="open-button" onclick="addUserForm()">add user</button>
        <div id="user">
            <form action="php/FridgeController.php" class="form-container" method="post">
                <h1>Add user</h1>
                <label for="quantity"><b>Email</b></label>
                <input type="text" placeholder="Enter email" name="email" required>
                <input type="hidden" value="<?php print($id);?>" name="adduser">
                <input type="submit" value="Сохранить" id="send" name="send"/>
            </form>
        </div>

        <div class="form-popup" id="myForm">
            <form action="php/FridgeController.php" class="form-container" method="post">
                <h1>Add product</h1>
                <select class="form__field" id="allProducts" name="product">
                </select>
                <label for="quantity"><b>Quantity</b></label>
                <input type="text" placeholder="Enter Quantity" name="quantity" required>
                <div class="form__field">
                    <label for="date">date start</label>
                    <input type="date" name="date_start" />
                </div>
                <div class="form__field">
                    <label for="date">date finish</label>
                    <input type="date" name="date_finish" />
                </div>
                <input type="hidden" value="<?php print($id);?>" name="addproduct">
                <input type="submit" value="Сохранить" id="send" name="send"/>
            </form>
        </div>
    <script>
        var products =JSON.parse('<?=json_encode($allProducts)?>');
        for (let product of products){
            var option = document.createElement("option");
            option.value = product;
            option.innerText = product;
            allProducts.appendChild(option);
        }
        document.getElementById("user").style.display = "none";
        document.getElementById("myForm").style.display = "none";
        function addUserForm() {
            document.getElementById("user").style.display = "block";
        }
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
    </script>
    </div>
    <footer>
        <span class="left">Все права защищены &copy; 2017</span>
        <span class="right"><a href="https://vk.com/antay1551"><img src="img/vk.jpg" alt=""></a></span>
    </footer>
    </body>
</htlm>