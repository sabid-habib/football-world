<?php
include("include/adminheader.php");
?>

<?php
$id= $_GET["id"];
    $fname = $_POST["pfname"];
    $lname = $_POST["plname"];
    $loaner_csdate = $_POST["csdate"];
    $loaner_csmonth = $_POST["csmonth"];
    $loaner_csyear=  $_POST["csyear"];
    $loanee_csdate = $_POST["cs2date"];
    $loanee_csmonth = $_POST["cs2month"];
    $loanee_csyear=  $_POST["cs2year"];
    $salary=$_POST["salary"];
    $nationality=  $_POST["nationality"];
    $loaner_cedate = $_POST["cedate"];
    $loaner_cemonth = $_POST["cemonth"];
    $loaner_ceyear=  $_POST["ceyear"];
    $loanee_cedate = $_POST["ce2date"];
    $loanee_cemonth = $_POST["ce2month"];
    $loanee_ceyear=  $_POST["ce2year"];
    $chkcsy_ln=(int)($loaner_csyear);
    $chkcey_ln=(int)($loaner_ceyear);
    $chkcsy_le=(int)($loanee_csyear);
    $chkcey_le=(int)($loanee_ceyear);
    $chk1=0;

    if($chkcsy_ln>$chkcey_ln || $chkcsy_le>$chkcey_le)
    {
        $chk1=$chk1+1;
    }

    
    
    if($chk1==0)
    {
        $db = oci_connect("system","1234","xe");
        $result = oci_parse($db,"call proc_update_parttime({$id},'{$fname}','{$lname}','{$nationality}',{$salary},'{$loaner_csdate}-{$loaner_csmonth}-{$loaner_csyear}','{$loaner_cedate}-{$loaner_cemonth}-{$loaner_ceyear}','{$loanee_csdate}-{$loanee_csmonth}-{$loanee_csyear}','{$loanee_cedate}-{$loanee_cemonth}-{$loanee_ceyear}')");
        oci_execute($result);
    }
    else
    {
        echo "Invalid Input!!!Contract Deadline Must Be Greater Than Contract Start date!";
    }
    
    
?>
</br>
<a href="viewparttimeplayers.php?param=player_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>
