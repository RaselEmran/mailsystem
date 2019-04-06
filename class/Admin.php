<?php 

include_once '../lib/database.php';

class Admin{
	public $db;
	private $fm;

	public function __construct(){
		$this->db = new database();
		
	}
	public function login($email,$password){
		$pass = md5($password);
		$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$pass'";
		$query = $this->db->link->query($sql);
        $info = $query->fetch_assoc();
        $row =$query->num_rows;
		if ($row == 1 ) {
			$_SESSION['email'] = $info['email'];

			//echo $_SESSION['email'];
			header("Location: dashbord.php");
		//echo '<script>window.location.href="dashbord.php";</script>';
			
		}else{
			return "Email Or password Don't Match !"  ;
		}

	}
		public function all_people(){

		$sql = "SELECT * FROM info ORDER BY id DESC ";
		$query = $this->db->link->query($sql);
		return $query;

	}


















}
 ?>