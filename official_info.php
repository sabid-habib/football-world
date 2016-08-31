<?php
include("include/adminheader.php");
?>


<?php


    $fname = $_POST["ofname"];
    $lname = $_POST["olname"];
    $date = $_POST["date"];
    $month = $_POST["month"];
    $year=  $_POST["year"];
    $nationality=  $_POST["nationality"];
    $salary = $_POST["salary"];
    $qualification = $_POST["qualification"];
    
	$db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call proc_add_official('{$fname}','{$lname}','{$date}-{$month}-{$year}','{$nationality}',{$salary},'{$qualification}')");
	oci_execute($result);
    //oci_execute($result);
    //echo $query;
    echo "Information Updated";
    
    
    
?>
</br>
<a href="viewofficials.php?param=official_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>
    