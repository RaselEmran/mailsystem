<?php 
include_once 'lib/database.php';
include_once 'class/Info.php';

$db    = new database();
$info = new Info();

date_default_timezone_set("Asia/Dhaka");
if (isset($_POST['view'])) {

	$date  = date("Y-m-d");
	$time = date('H:i');
	$sql = "SELECT * FROM sent_mail WHERE s_date = '$date' AND s_time = '$time' ";
	$query = $db->link->query($sql);

	if ($query) {

		$fet = $query->fetch_assoc();
		$id = $fet['id'];
	 	$m_id = $fet['m_id'];

	 
		$info->mailing($id,$m_id);

	}else{
			$fet = $query->fetch_assoc();
	echo 	$id = $fet['id'];
	}

}
		//  function send($fet,$info_query)
		// {	

		// 	echo $info_query['surname'];

		// }
		
		

		






 ?>