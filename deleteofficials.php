<?php
include("include/adminheader.php");


$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$result=oci_parse($db,"call pro_delete_official({$id})");
oci_execute($result);
echo("Official Deleted</br><a href=\"viewofficials.php?param=official_id\">View Updated table here</a>");



include("include/adminfooter.php");
?>