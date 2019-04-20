<?php
session_start();
require_once 'php/User.php';
require_once 'php/Fridge.php';
require_once 'php/Product.php';

$user = new User($_SESSION['id_user']);
$user->connect();
$fridge = new Fridge($_SESSION['id_user']);
$allProducts = $fridge->getProducts();
$product = new Product();
$productInformation = $product->allProducts($_GET);

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
				<span class="contact">
					<a href="register.html">Регистрация</a>
				</span>
				<span class="contact">
					<a href="auth.php" title="Войти">Вход</a>
				</span>
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
                <div class="form-popup" id="myForm">
                    <form action="php/FridgeController.php" class="form-container" method="post">
                        <h1>Add product</h1>
                        <select class="form__field" id="allProducts" name="product">
                            <option selected="selected">
                                <?php print($productInformation[0]["name"]);?>
                            </option>
                        </select>
                        <label for="quantity"><b>Quantity</b></label>
                        <input type="text" placeholder="Enter Quantity" name="quantity"  value="<?php print($productInformation[0]["quantity"]);?>" required>
                        <div class="form__field">
                            <label for="date">date start</label>
                            <input type="date" name="date_start" value="<?php print($productInformation[0]["date_start"]);?>"/>
                        </div>
                        <div class="form__field">
                            <label for="date">date finish</label>
                            <input type="date" name="date_finish"  value="<?php print($productInformation[0]["date_finish"]);?>"/>
                        </div>
                        <input type="hidden" value="<?php print($id);?>" name="addproduct">
                        <input type="submit" value="Сохранить" id="send" name="send"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var products =JSON.parse('<?=json_encode($allProducts)?>');
        for (let product of products){
            var option = document.createElement("option");
            option.value = product;
            option.innerText = product;
            allProducts.appendChild(option);
        }
    </script>
    <footer>
        <span class="left">Все права защищены &copy; 2017</span>
        <span class="right"><a href="https://vk.com/antay1551"><img src="img/vk.jpg" alt=""></a></span>
    </footer>
    </body>
</htlm>