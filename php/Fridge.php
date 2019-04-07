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

    public function getProducts() {
        $result = self::$con->query("SELECT * FROM product");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $records[] = $row;
        }
        $allProducts = [];
        for($i = 0; $i < count($records); $i++){
            $allProducts[] = $records[$i]["name"];
        }
        return $allProducts;
    }

    public function getUser($email) {
            $result = self::$con->query("SELECT * FROM users");
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                $records[] = $row;
            }
            $idUser = -1;
            for($i = 0; $i < count($records); $i++){
                if($email == $records[$i]["email"]) {
                    $idUser = $records[$i]["id"];
                }
            }
            return $idUser;
        }
    public function addUser($date)
        {
            $userToAdd = $this->getUser($date['email']);
            self::$con->query("INSERT INTO fridge_user (id_fridge, id_people, role)
	        							VALUES ('" . $date['adduser'] . "','" . $userToAdd . "', '" .'user'."')");
            header("Location: http://project.test/fridge.php?id=".$date['adduser']);
        }

    public function addProduct($date)
    {
        $allProducts = $this->getProducts();
        $idProduct = -1;
        for ($i = 0; $i < count($allProducts); $i++) {
            if ($allProducts[$i] == $date['product']) {
                $idProduct = $i + 1;
                break;
            }
        }
        if ($date['date_start'] == NULL && $date['date_finish'] == NULL) {
            self::$con->query("INSERT INTO bookmark (id_fridge, id_product, quantity)
	        							VALUES ('" . $date['addproduct'] . "','" . $idProduct . "', '" . $date['quantity'] . "')");
        } else if ($date['date_start'] == NULL) {
            self::$con->query("INSERT INTO bookmark (id_fridge, id_product, quantity, date_finish)
	        							VALUES ('" . $date['addproduct'] . "','" . $idProduct . "', '" . $date['quantity'] . "','" . $date['date_finish'] . "')");
        } else if ($date['date_finish'] == NULL) {
            self::$con->query("INSERT INTO bookmark (id_fridge, id_product, quantity, date_start)
	        							VALUES ('" . $date['addproduct'] . "','" . $idProduct . "', '" . $date['quantity'] . "','" . $date['date_start'] . "')");
        } else {
            self::$con->query("INSERT INTO bookmark (id_fridge, id_product, quantity, date_start, date_finish)
	        							VALUES ('" . $date['addproduct'] . "','" . $idProduct . "', '" . $date['quantity'] . "', '" . $date['date_start'] . "', '" . $date['date_finish'] . "')");
        }
        header("Location: http://project.test/fridge.php?id=".$date['addproduct']);

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