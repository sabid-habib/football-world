<?php
include("include/adminheader.php");
?>

<?php

    $id = $_POST["id"];
    $name = $_POST["sname"];
    $capacity = $_POST["capacity"];
    $street = $_POST["street"];
    $area=  $_POST["area"];
    $city=  $_POST["city"];
    
	$db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call pro_update_stadium({$id},'{$name}',{$capacity},'{$street}','{$area}','{$city}')");
	oci_execute($result);
    
    echo "Information Updated";
    
    
    
?>
</br>
<a href="viewstadiums.php?param=stadium_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>