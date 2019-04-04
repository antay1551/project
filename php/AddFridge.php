<?php
require_once 'connection.php';
session_start();

class AddFridge
{
    public $name;
    public $last_defrost;
    static public $con;

    function __construct($date)
    {
        $this->name = $date["name"];
        $this->last_defrost = $date["date"];
        self::$con = Connection::get_instance()->dbh;
    }

    public function saveImg(){
        $imagename = $_FILES['file']['name'];
        $imagetemp = $_FILES['file']['tmp_name'];
        $imagePath = "../img/";
        if(is_uploaded_file($imagetemp)) {
            if(move_uploaded_file($imagetemp, $imagePath . $_SESSION['id_user'] . $imagename)) {
                //echo "Sussecfully uploaded your image.";
            }
        }
    }

    public function connect()
    {
        $this->saveImg();
        $imagename = $_FILES['file']['name'];
        $result = self::$con->query("INSERT INTO characteristic_fridge (name_fridge, last_defrost, img) 
	        							VALUES ('".$this->name."','". $this->last_defrost."','".  $_SESSION['id_user'].$imagename ."')");
    }
}