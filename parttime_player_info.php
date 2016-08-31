<?php
include("include/adminheader.php");

    $fname = $_POST["pfname"];
    $lname = $_POST["plname"];
    $date = $_POST["date"];
    $month = $_POST["month"];
    $year=  $_POST["year"];
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
    $loaner=$_POST["loaner_id"];
    $loanee=$_POST["loanee_id"];
    $chkcsy_ln=(int)($loaner_csyear);
    $chkcey_ln=(int)($loaner_ceyear);
    $chkcsy_le=(int)($loanee_csyear);
    $chkcey_le=(int)($loanee_ceyear);
    $chk1=0;
    $chk2=0;

    if($chkcsy_ln>$chkcey_ln || $chkcsy_le>$chkcey_le)
    {
        $chk1=$chk1+1;
    }

    
    if($loaner!=$loanee)
    {
	if($chk1==0)
	{   
	    $db=oci_connect('system','1234','XE');
	    $result=oci_parse($db,"call proc_add_part_player('{$fname}','{$lname}','{$date}-{$month}-{$year}','{$nationality}',{$salary},{$loaner},{$loanee},'{$loaner_csdate}-{$loaner_csmonth}-{$loaner_csyear}','{$loaner_cedate}-{$loaner_cemonth}-{$loaner_ceyear}','{$loanee_csdate}-{$loanee_csmonth}-{$loanee_csyear}','{$loanee_cedate}-{$loanee_cemonth}-{$loanee_ceyear}')");
	    $r=oci_execute($result);
	//echo $query;
	    if($r)echo "Information Updated</br>";
	}
	else
	{
	    echo "Invalid Input!!!Check The Contract Times!";
	}
    }
    else
    {
	echo "Invalid Input!!!Loaner Club And Loanee Club Cannot Be The Same!</br>";
    }    
    
    


echo("<a href=\"viewparttimeplayers.php?param=player_id\">Go Back</a>");

include("include/adminfooter.php");
?>