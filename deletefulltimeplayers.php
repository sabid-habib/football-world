<?php
include("include/adminheader.php");


$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$result=oci_parse($db,"call pro_delete_fulltime_player({$id})");
oci_execute($result);
echo("PLAYER Deleted</br><a href=\"viewfulltimeplayers.php?param=player_id\">View Updated table here</a>");


include("include/adminfooter.php");
?>