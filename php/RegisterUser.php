<?php
require_once 'connection.php';

	class RegisterUser {
		public $login;
		public $password;
		public $phone;
		public $name;
	    static public $con;

		function __construct($date){
	        self::$con = Connection::get_instance()->dbh;
			$this->login = $date["email"];
			$this->password = $date["password"];
			$this->phone = $date["phone"];
			$this->name = $date["name"];
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
       	$result = self::$con->query("INSERT INTO users (name, email, phone, password) 
	        							VALUES ('".$this->name."','". $this->login."','". $this->phone ."','".$this->password."')");
		}
	}
 ?>