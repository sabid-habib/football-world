<?php
include("include/adminheader.php");
?>

<?php

    $id= $_POST["id"];
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
        $db = oci_connect("system","1234","xe");
        $result = oci_parse($db,"call pro_update_fulltime({$id},'{$fname}','{$lname}','{$date}-{$month}-{$year}','{$nationality}',{$salary},{$club},'{$csdate}-{$csmonth}-{$csyear}','{$cedate}-{$cemonth}-{$ceyear}',{$buyout})");
        oci_execute($result);
    }
    else
    {
        echo "Invalid Input!!!Contract Deadline Must Be Greater Than Contract Start date!";
    }
    
    
?>
</br>
<a href="viewfulltimeplayers.php?param=player_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>
