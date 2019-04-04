<?php
require_once 'connection.php';
session_start();

class Change
{
    public $id;
    static public $con;
    public $email;
    public $password;
    public $phone;
    public $name;

    function __construct($date)
    {
        $this->id = $_SESSION['id_user'];
        $this->email = $date["email"];
        $this->password = $date["password"];
        $this->phone = $date["phone"];
        $this->name = $date["name"];
        self::$con = Connection::get_instance()->dbh;
    }

    public function connect()
    {
        $result = self::$con->query("UPDATE users set name = '".$this->name."', `email` ='".$this->email."', phone = '".$this->phone."', password = '".$this->password."' where id = $this->id");
    }
}
?>