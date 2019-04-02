<?php
require_once 'connection.php';

class LoginUser {
    public $login;
    public $password;
    static public $con;

    function __construct($date){
        self::$con = Connection::get_instance()->dbh;
        $this->login = $date["email"];
        $this->password = $date["password"];
        $this->set_login($this->login);
        $this->set_password($this->password);
    }

    public function set_login( $login ){
        $this->login = stripslashes($login);
        $this->login = htmlspecialchars($this->login);
        $this->login = trim($this->login);
    }

    public function set_password( $password ){
        $this->password = stripslashes($password);
        $this->password = htmlspecialchars($this->password);
        $this->password = trim($this->password);
    }
    public function get_login( ){
        return ($this->login);
    }
    public function get_password( ){
        return ($this->password);
    }

    public function connect(){
        $result = self::$con->query("SELECT id FROM users WHERE email='$this->login' and password='$this->password'");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
             $records[] = $row;
        }
        if (isset($records[0]['id'])){
            $_SESSION["id_user"] = $records[0]['id'];
            //print('ok111<br>');
            //print('ok111');
            header('Location: http://project.test/index.html');
        }
    }
}
?>