<?php

    $id= $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $date = $_POST["date"];
    $month = $_POST["month"];
    $year=  $_POST["year"];
    $nationality=  $_POST["nationality"];
    $salary = $_POST["salary"];
    $qualification = $_POST["qualification"];
    
	$db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call pro_update_official (
                          {$id},'{$fname}','{$lname}','{$date}-{$month}-{$year}','{$nationality}',{$salary},'{$qualification}'
                          )
                          "
                          );
	oci_execute($result);
   
    echo "Information Updated";
    
    
    
?>
</br>
<a href="viewofficials.php?param=official_id">Go Back</a>