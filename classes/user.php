<?php
include('password.php');
class User extends Password{

    private $_db;
	private $balls;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	private function validate_user($username,$password){

		try {
			$stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE username = :username AND password = :password AND active="Yes" ');
			$stmt->execute(array('username' => $username,
				':password' => $password));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$row = $this->validate_user($username,$password);

		//if($this->password_verify($password,$row['password']) == 1){
		if(!empty($row)){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
	public function setGumballs($amount)
	{
		return $this->balls = $amount;
	}
	public function getGumballs()
	{
		return $this->balls;
	}
	
	public function turnWheel($amount)
	{
		return $amt = $amount - 1;
	}

}


?>
