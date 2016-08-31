<?php
include("include/adminheader.php");


$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$result=oci_parse($db,"call pro_delete_matches({$id})");
oci_execute($result);
if($result)echo("Match Deleted</br><a href=\"viewmatches.php?param=match_id\">View Updated table here</a>");
else echo("Error");


include("include/adminfooter.php");
?>