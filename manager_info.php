<?php
include("include/adminheader.php");
    
    $fname = $_POST["mfname"];
    $lname = $_POST["mlname"];
    $date = $_POST["date"];
    $month = $_POST["month"];
    $year=  $_POST["year"];
    $nationality=  $_POST["nationality"];
    $club = $_POST["club"];
    $csdate = $_POST["csdate"];
    $csmonth = $_POST["csmonth"];
    $csyear=  $_POST["csyear"];
    $salary=$_POST["salary"];
    $cedate = $_POST["cedate"];
    $cemonth = $_POST["cemonth"];
    $ceyear=  $_POST["ceyear"];
    $chkcsy=(int)($csyear);
    $chkcey=(int)($ceyear);
    $chk=0;
    $chk1=0;
    if($chkcsy>$chkcey)
    {
        $chk1=$chk1+1;
    }
    
	$db=oci_connect('system','1234','XE');
        $query="select extract(year from contract_start),extract(year from contract_deadline) from manager_club_contract where club_id={$club}";
        $result=oci_parse($db,$query);
        oci_execute($result);
        while($row=oci_fetch_array($result))
       {
            $cstart = $row[0];
            $cend=$row[1];
            if(($chkcsy<=$cend && $chkcey>=$cstart))
            {
                $chk=$chk+1;
            }
       }
       if($chk1==0)
       {
       if($chk==0)
        {
            $result1=oci_parse($db,"call pro_add_manager('{$fname}','{$lname}','{$date}-{$month}-{$year}','{$nationality}',{$club},'{$csdate}-{$csmonth}-{$csyear}','{$cedate}-{$cemonth}-{$ceyear}',{$salary})");
        oci_execute($result1);
        }
        else
        {
            
            echo "Invalid Input!!!Manager Already exists in this timeline,Try another one";
        }
       }
       else
       {
            echo "Invalid Input!!!Contract Deadline must be greater than Contract Start Date.";
       }
       
       
    //echo "Information Updated";
    
    
    

echo("</br>
<a href=\"viewmanagers.php?param=manager_id\">Go Back</a>");

include("include/adminfooter.php");
?>