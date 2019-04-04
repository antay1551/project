<?php

class AddFridge
{
    public $login;
    public $password;
    static public $con;

    function __construct($date)
    {
        self::$con = Connection::get_instance()->dbh;
    }

    public function connect()
    {
        $result = self::$con->query("SELECT id FROM users WHERE email='$this->login' and password='$this->password'");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $records[] = $row;
        }
        if (isset($records[0]['id'])) {
            $_SESSION["id_user"] = $records[0]['id'];
            //header('Location: http://project.test/index.html');
        }
    }
}