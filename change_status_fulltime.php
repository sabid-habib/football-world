<?php
include("include/adminheader.php");
?>

<?php
$loaner=$_GET["cid"];
$id= $_POST["id"];
    $lncsdate = $_POST["csdate"];
    $lncsmonth = $_POST["csmonth"];
    $lncsyear=  $_POST["csyear"];
    $lncedate = $_POST["cedate"];
    $lncemonth = $_POST["cemonth"];
    $lnceyear=  $_POST["ceyear"];
    $lecsdate = $_POST["csdate"];
    $lecsmonth = $_POST["csmonth"];
    $lecsyear=  $_POST["csyear"];
    $lecedate = $_POST["cedate"];
    $lecemonth = $_POST["cemonth"];
    $leceyear=  $_POST["ceyear"];
    
    $loanee=$_POST["club"];
    

    
    
   // echo ("$id-$club'{$csdate}-{$csmonth}-{$csyear}' '{$cedate}-{$cemonth}-{$ceyear}'-{$buyout}") ;
        $db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call pro_full_to_part({$id},{$loaner},{$loanee},'{$lncsdate}-{$lncsmonth}-{$lncsyear}','{$lncedate}-{$lncemonth}-{$lnceyear}','{$lecsdate}-{$lecsmonth}-{$lecsyear}','{$lecedate}-{$lecemonth}-{$leceyear}')");
	oci_execute($result);

    
    
?>
</br>
<a href="viewfulltimeplayers.php?param=player_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>
