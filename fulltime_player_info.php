<?php
include("include/adminheader.php");
?>

<?php

    $fname = $_POST["pfname"];
    $lname = $_POST["plname"];
    $date = $_POST["date"];
    $month = $_POST["month"];
    $year=  $_POST["year"];
    $csdate = $_POST["csdate"];
    $csmonth = $_POST["csmonth"];
    $csyear=  $_POST["csyear"];
    $salary=$_POST["salary"];
    $nationality=  $_POST["nationality"];
    $cedate = $_POST["cedate"];
    $cemonth = $_POST["cemonth"];
    $ceyear=  $_POST["ceyear"];
    $buyout=$_POST["buyout"];
    $club=$_POST["club"];
    $chkcsy=(int)($csyear);
    $chkcey=(int)($ceyear);
    $chk1=0;

    if($chkcsy>$chkcey)
    {
        $chk1=$chk1+1;
    }
    if($chk1==0)
    {
	$db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call proc_add_full_player({$club},'{$fname}','{$lname}','{$date}-{$month}-{$year}','{$nationality}',{$salary},'{$csdate}-{$csmonth}-{$csyear}','{$cedate}-{$cemonth}-{$ceyear}',{$buyout})");
	oci_execute($result);
    }
    else
    {
	echo "Invalid Input!!!Contract Deadline must be greater than Contract Start Date.";
    }
    
    
    
?>
</br>
<a href="viewfulltimeplayers.php?param=player_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>
