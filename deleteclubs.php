<?php
include("include/adminheader.php");


$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$result=oci_parse($db,"call pro_delete_club({$id})");
oci_execute($result);
if($result)echo("Club Deleted</br><a href=\"viewclubs.php?param=club_id\">View Updated table here</a>");
else echo("Error");


include("include/adminfooter.php");
?>