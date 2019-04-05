<?php
require_once 'connection.php';
session_start();

    class Fridge {
    public $password;
    public $id;
    public $name;
    public $email;
    public $phone;
    static public $con;

    function __construct($id){
        self::$con = Connection::get_instance()->dbh;
        $this->id = $id;
    }

    public function set_name( $name ){
        $this->name = $name;
    }

    public function get_name(){
        return $this->name;
    }

    public function set_email( $email ){
        $this->email = $email;
    }

    public function get_email( ){
        return $this->email;
    }

    public function set_password( $password ){
        $this->password = $password;
    }

    public function get_password( ){
        return $this->password;
    }

    public function set_phone( $phone ){
        $this->phone = $phone;
    }

    public function get_phone( ){
        return  $this->phone;
    }

    public function connect(){
        $result = self::$con->query("SELECT * FROM fridge_user WHERE id_people = '$this->id'");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $records[] = $row;
        }
        $allIdFridge = [];
        for($i = 0; $i < count($records); $i++){
            $allIdFridge[] = $records[$i]["id_fridge"];
        }
        $result = self::$con->query("SELECT * FROM characteristic_fridge WHERE id in  (".implode(',',$allIdFridge).")");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $recordsFridge[] = $row;
        }
        return $recordsFridge;
    }
}
?>