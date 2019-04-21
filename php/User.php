<?php
require_once 'connection.php';
session_start();

class User {
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

    public function set_name($name){
        $this->name = $name;
    }

    public function get_name(){
        return $this->name;
    }

    public function set_email($email){
        $this->email = $email;
    }

    public function get_email(){
        return $this->email;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function get_password(){
        return $this->password;
    }

    public function set_phone($phone){
        $this->phone = $phone;
    }

    public function get_phone(){
        return  $this->phone;
    }

    public function connect(){
        $result = self::$con->query("SELECT * FROM users WHERE id = '$this->id'");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $records[] = $row;
        }
        $this->set_name($records[0]['name']);
        $this->set_phone($records[0]['phone']);
        $this->set_email($records[0]['email']);
        $this->set_password($records[0]['password']);
    }
    public function showAllUser($data) {
        $result = self::$con->query("SELECT fridge_user.id, fridge_user.role, users.email FROM fridge_user inner join users on users.id = fridge_user.id_people WHERE id_fridge = '".$data["showAllUser"]."'");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $allUsers[] = $row;
        }
        return $allUsers;
    }
}
?>