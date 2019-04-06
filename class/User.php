<?php 
include_once 'lib/database.php';
 
class User{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new database();
		
	}
	
	public function front_value($nationality,$type,$first,$surname,$birth,$passport,$phone,$email,
             $pass_file,$adi_file){

	$email1 = $first.$surname.rand(100,1000).'@gmail.com';
	$email2 = $first.$surname.rand(100,1000).'@gmail.com';
	$email3 = $first.$surname.rand(100,1000).'@gmail.com';
	$email4 = $first.$surname.rand(100,1000).'@gmail.com';
	$email5 = $first.$surname.rand(100,1000).'@gmail.com';
	$email6 = $first.$surname.rand(100,1000).'@gmail.com';
	$email7 = $first.$surname.rand(100,1000).'@gmail.com';
	$email8 = $first.$surname.rand(100,1000).'@gmail.com';
	

		$permited  = array('jpg', 'jpeg', 'png', 'gif','pdf');

		$pass_name = $_FILES['pass_file']['name'];
		$pass_size = $_FILES['pass_file']['size'];
		$pass_temp = $_FILES['pass_file']['tmp_name'];
	
		$adi_name = $_FILES['adi_file']['name'];
		$adi_size = $_FILES['adi_file']['size'];
		$adi_temp = $_FILES['adi_file']['tmp_name'];


		$div = explode('.', $pass_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_pass = "file/".$unique_image;

		$adi = explode('.', $adi_name);
		$adi_ext = strtolower(end($adi));
		$adi_image = substr(md5(time()), 0, 11).'.'.$adi_ext;
		$uploaded_adi = "file/".$adi_image;

		// var_dump($unique_image);
		// var_dump($adi_image);

		if ($pass_size > 1048567) {
			return  "<span class= 'error'>Passport attached file size must be less 1mb</span>";
		}elseif($adi_size > 1048567){
			return  "<span class= 'error'>Aditional attached file size must be less 1mb</span>";

		}elseif(in_array($file_ext, $permited) === false){
			return "<span class= 'error'>Passport attached file Type must be ".implode(', ', $permited). "</span>";
		}elseif(in_array($adi_ext, $permited) === false){
			return "<span class= 'error'>Aditional attached file Type must be ".implode(', ', $permited). "</span>";
		}else{
			$pass_up = move_uploaded_file($pass_temp, $uploaded_pass);
			$adi_up  = move_uploaded_file($adi_temp, $uploaded_adi);

			if ($pass_up === true && $adi_up === true ) {
				$y = date('Y');
				$m = date('m');
				$d = date('m/d/Y');

					$sql = "INSERT INTO info (nationality,type,first,surname,birth,passport,phone,email,email1,email2,email3,email4,email5,email6,email7,email8,pass_file,adi_file,year,month,date) 
									VALUES ('$nationality','$type','$first','$surname','$birth','$passport','$phone','$email','$email1','$email2','$email3','$email4','$email5','$email6','$email7','$email8','$uploaded_pass','$uploaded_adi','$y','$m','$d')";

					$query = $this->db->link->query($sql);
				return "Your Information Added Successfully.";

				}else{
					return "Something Wrong. Data Not Saved.";
				}
		}
	}
	
}

 ?>