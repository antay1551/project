<?php
require_once 'connection.php';

class Product
{
    static public $con;

    function __construct()
    {
        self::$con = Connection::get_instance()->dbh;
    }

    function allProducts($get){
        //print_r($get);
        $idProduct = $get["idProduct"];
        $idFridge = $get["id"];
        $product = self::$con->query("SELECT quantity, `name`, unit, date_start, date_finish FROM bookmark inner join product on bookmark.id_product = product.id WHERE bookmark.id = $idProduct and bookmark.id_fridge = $idFridge" );

        //$product = self::$con->query("select *  from bookmark where id = $idProduct and id_fridge = $idFridge");
        while ($row = $product->fetch(PDO::FETCH_ASSOC)){
            $productInformation[] = $row;
        }
        //print_r($productInformation);
        return $productInformation;
    }

    function change($get){
        //print_r($get);
        //$result = self::$con->query("UPDATE users set name = '".$this->name."', `email` ='".$this->email."', phone = '".$this->phone."', password = '".$this->password."' where id = $this->id");
    }
}