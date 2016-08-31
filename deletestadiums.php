<?php
include("include/adminheader.php");


$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$result=oci_parse($db,"call pro_delete_stadium({$id})");
oci_execute($result);
echo("Stadium Deleted</br><a href=\"viewstadiums.php?param=stadium_id\">View Updated table here</a>");



include("include/adminfooter.php");
?>