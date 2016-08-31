<?php
include("include/adminheader.php");


$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$result=oci_parse($db,"call pro_delete_manager({$id})");
oci_execute($result);
echo("Manager Deleted</br><a href=\"viewmanagers.php?param=manager_id\">View Updated table here</a>");



include("include/adminfooter.php");
?>