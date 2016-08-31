<?php
include("include/adminheader.php");
?>

<?php
$id= $_GET["id"];
$club=$_GET["club"];
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
    

    
    
   // echo ("$id-$club'{$csdate}-{$csmonth}-{$csyear}' '{$cedate}-{$cemonth}-{$ceyear}'-{$buyout}") ;
        $db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call pro_part_to_full({$id},{$club},'{$csdate}-{$csmonth}-{$csyear}','{$cedate}-{$cemonth}-{$ceyear}',{$buyout})");
	oci_execute($result);

    
    
?>
</br>
<a href="viewparttimeplayers.php?param=player_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>
