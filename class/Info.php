<?php 
include_once '../lib/database.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
class Info{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new database();
		
	}
	public function insert($nationality,$type,$first,$surname,$birth,$passport,$phone,$email,
             $email1,$email2,$email3,$email4,$email5,$email6,$email7,$email8,$pass_file,$adi_file){

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
				return "<span class= 'success'>Data Save.</span>";

				}else{
					return 'false';
				}

		}

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
	public function all_people(){

		$sql = "SELECT * FROM info ORDER BY id DESC ";
		$query = $this->db->link->query($sql);
		return $query;

	}
	public function person($id){
		$sql = "SELECT * FROM info WHERE id = '$id' ";
		$query = $this->db->link->query($sql)->fetch_assoc();
		return $query;
	}
	public function edit($id,$nationality,$type,$first,$surname,$birth,$passport,$phone,$email,
             $email1,$email2,$email3,$email4,$email5,$email6,$email7,$email8,$pa_file,$ad_file){

		$permited  = array('jpg', 'jpeg', 'png', 'gif','pdf');

		$sql = "SELECT * FROM info WHERE id = '$id' ";
		$query = $this->db->link->query($sql)->fetch_assoc();
		// var_dump($query);
				$y = date('Y');
				$m = date('m');
				$d = date('m/d/Y');

		if ($pa_file != null ) {
			unlink($query['pass_file']);
			$pass_name = $_FILES['pass_file']['name'];
			$pass_size = $_FILES['pass_file']['size'];
			$pass_temp = $_FILES['pass_file']['tmp_name'];

			$div = explode('.', $pass_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_pass = "file/".$unique_image;

			if ($pass_size > 1048567) {
				return  "<span class= 'error'>Passport attached file size must be less 1mb</span>";
			}elseif (in_array($file_ext, $permited) === false) {
				return "<span class= 'error'>Passport attached file Type must be ".implode(', ', $permited). "</span>";
			}else{
			    move_uploaded_file($pass_temp, $uploaded_pass);
			}
		}else{
			$uploaded_pass = $query['pass_file'];
		}


		if ($ad_file != null ) {
			unlink($query['adi_file']);
			$adi_name = $_FILES['adi_file']['name'];
			$adi_size = $_FILES['adi_file']['size'];
			$adi_temp = $_FILES['adi_file']['tmp_name'];

			$adi = explode('.', $adi_name);
			$adi_ext = strtolower(end($adi));
			$adi_image = substr(md5(time()), 0, 11).'.'.$adi_ext;
			$uploaded_adi = "file/".$adi_image;

			if ($adi_size > 1048567) {
				return  "<span class= 'error'>Aditional attached file size must be less 1mb</span>";
			}elseif(in_array($adi_ext, $permited) === false){
				return "<span class= 'error'>Aditional attached file Type must be ".implode(', ', $permited). "</span>";
			}else{
			    move_uploaded_file($adi_temp, $uploaded_adi);
			}

		}else{
			$uploaded_adi = $query['adi_file'];
		}



		$sql = "UPDATE info SET nationality = '$nationality',
								type = '$type',
								first = '$first',
								surname = '$surname',
								birth = '$birth',
								passport = '$passport',
								phone = '$phone',
								email = '$email',
								email1 = '$email1',
								email2 = '$email2',
								email3 = '$email3',
								email4 = '$email4',
								email5 = '$email5',
								email6 = '$email6',
								email7 = '$email7',
								email8 = '$email8',
								pass_file = '$uploaded_pass',
								adi_file = '$uploaded_adi',
								year = '$y',
								month = '$m',
								date = '$d'
								 WHERE id = '$id' " ;

		$query = $this->db->link->query($sql);


	}
	public function mail_sent($to,$name,$subject,$date,$time,$id){
				$y = date('Y');
				$m = date('m');
				$d = date('m/d/Y');

		$sql = "INSERT INTO sent_mail (s_to,s_name,s_subject,s_date,s_time,m_id,year,month,date) 
				VALUES ('$to','$name','$subject','$date','$time','$id','$y','$m','$d') ";
		$query = $this->db->link->query($sql);

	}
	public function mailing($id,$m_id){

		$sql = "SELECT * FROM info WHERE id = '$m_id' ";
		$query = $this->db->link->query($sql)->fetch_assoc();
		$sqll = "SELECT * FROM sent_mail WHERE id = '$id' ";
		$queryy = $this->db->link->query($sqll)->fetch_assoc();

        $name = ucwords($query['first']). ' ' .$query['surname'];
        $u_name = strtoupper($query['first']) . ' ' . strtoupper($query['surname']);
     echo   $msg = "<p>Dear Madam/Sir,</p><br>
            	<span>I need an appointment for visa. My details are:</span><br>
            	<span>First Name and Surname: ". $u_name ."</span><br>
            	<span>Date of Birth:".$query['birth']."</span><br>
            	<span>Passport Number: ".$query['passport']."</span><br>
            	<span>Purpose of Travel: ".$query['type']."</span><br>
            	<span>Phone Number: ".$query['phone']."</span><br>
            	<span>Email: ".$query['email']."</span><br>
            	<span>The copy of my passport and the copy of the documents proving the travel purpose are attached.</span><br>";

        // $form = [$query['email1'],$query['email2'],$query['email3'],$query['email4'],$query['email5'],$query['email6'],$query['email7'],$query['email8'] ];
            
        //     //Load Composer's autoloader
        //     require 'vendor/autoload.php';
        //     $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            
        //     try {
                
        //        foreach ($form as $key => $value) {
             
        //             $mail->setFrom($value, $name);
        //             $mail->addAddress($queryy['s_to'], $queryy['s_name']);     // Add a recipient
        //             $mail->addAddress($queryy['s_to']);               // Name is optional
        //             $mail->addReplyTo('info@example.com', 'Information');
        //             $mail->addCC('cc@example.com');
        //             $mail->addBCC('bcc@example.com');
                
        //             //Attachments
        //             // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    
        //             $mail->addAttachment($query['pass_file']);    // Optional name
        //             $mail->addAttachment($query['adi_file']);
                    
                
        //             //Content
        //             $mail->isHTML(true);                                  // Set email format to HTML
        //             $mail->Subject = $queryy['s_subject'];
        //             $mail->Body    =  $msg;
        //             $mail->AltBody =  $msg;
        //             $mail->send();
        //             echo 'Message has been sent';
                    
        //         }
        //     } catch (Exception $e) {
        //         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        //     }
            

	}

	






}

 ?>