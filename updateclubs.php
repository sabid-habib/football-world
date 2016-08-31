<?php
include("include/adminheader.php");


$id= $_POST["nid"];
$name = $_POST["nname"];
$owner = $_POST["nowner"];
$sid =$_POST["nsid"];
	$db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call pro_update_club({$id},'{$name}','{$owner}',{$sid})");
	oci_execute($result);

echo("Club Updated</br><a href=\"viewclubs.php?param=club_id\">View Updated Clubs here</a>");


include("include/adminfooter.php");
?>