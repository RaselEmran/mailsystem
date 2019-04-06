<?php 
include_once 'lib/database.php';
include_once 'class/Info.php';
$db    = new Database();
$info = new Info();

echo $info->mailing();



?>