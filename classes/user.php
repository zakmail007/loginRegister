<?php
include('password.php');
class User extends Password{

    private $_db;
	private $balls;

	
	private function validate_user($username,$password){
		
		$stmt = mysql_query('SELECT password, username, memberID FROM members WHERE username = "'.$username.'" AND password = "'.$password.'" AND active="Yes" ');
		$row = mysql_fetch_array($stmt);

		return $row;

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
