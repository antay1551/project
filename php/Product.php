<?php
require_once 'connection.php';

class Product
{
    static public $con;

    function __construct()
    {
        self::$con = Connection::get_instance()->dbh;
    }

    function find($data){
        $allFridfeId =[];
        foreach ($data as $key => $value) {
            if (strripos($key, "fridge") !== false) {
                $allFridfeId[] = $value;
            }
        }
        $allProducts = [];
        $idProduct = -1;
        $result = self::$con->query("SELECT * FROM product");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $records[] = $row;
        }
        for($i = 0; $i < count($records); $i++){
            if($data["product"] == $records[$i]["name"] ) {
                $idProduct = $records[$i]["id"];
            }
            $allProducts[] = $records[$i]["name"];
        }
        $product = self::$con->query("SELECT quantity, date_start, date_finish, characteristic_fridge.name_fridge FROM bookmark inner join characteristic_fridge on characteristic_fridge.id = bookmark.id_fridge where id_fridge in (".implode(',',$allFridfeId).") and id_product = $idProduct");
        while ($row = $product->fetch(PDO::FETCH_ASSOC)){
            $productInformation[] = $row;
        }
        $productInfo[0] = $data["product"];
        $productInfo[1] = $productInformation;
        return $productInfo;
    }

    function allProducts($get){
        $idProduct = $get["idProduct"];
        $idFridge = $get["id"];
        $product = self::$con->query("SELECT quantity, `name`, unit, date_start, date_finish FROM bookmark inner join product on bookmark.id_product = product.id WHERE bookmark.id = $idProduct and bookmark.id_fridge = $idFridge" );
        while ($row = $product->fetch(PDO::FETCH_ASSOC)){
            $productInformation[] = $row;
        }
        return $productInformation;
    }

    function change($data){
        $product = self::$con->query("SELECT * FROM product" );
        while ($row = $product->fetch(PDO::FETCH_ASSOC)){
            $allProductInformation[] = $row;
        }
        $idProduct = -1;
        for($i = 0; $i < count($allProductInformation); $i++){
            if($data["product"] == $allProductInformation[$i]["name"] ) {
                $idProduct = $allProductInformation[$i]["id"];
                break;
            }
        }
        self::$con->query("UPDATE bookmark set quantity = '".$data["quantity"]."', `date_start` ='".$data["date_start"]."', date_finish = '".$data["date_finish"]."' where id_fridge = '".$data["changeProduct"]."' and id_product = $idProduct and id = '".$data["idProduct"]."'");
        header("Location: http://project.test/fridge.php?id=".$data["changeProduct"]);
    }
}