<?php

    $id= $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
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
	if($chk==0)
        {
	$result=oci_parse($db,"call pro_update_manager({$id},'{$fname}','{$lname}','{$date}-{$month}-{$year}','{$nationality}',{$club},'{$csdate}-{$csmonth}-{$csyear}','{$cedate}-{$cemonth}-{$ceyear}',{$salary})");
	oci_execute($result);
	echo "Information Updated";
	}
        else
        {
            
            echo "Manager Already exists in this timeline,Try another one";
        }
        
   
    
    
    
    
?>
</br>
<a href="viewmanagers.php?param=manager_id">Go Back</a>