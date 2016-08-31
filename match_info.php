<?php
include("include/adminheader.php");
?>

<?php

    $home = $_POST["home"];
    $away = $_POST["away"];
    $date = $_POST["date"];
    $month = $_POST["month"];
    $year=  $_POST["year"];
    $venue=  $_POST["stadium"];
    $time=  $_POST["time"];
    $hscore=  $_POST["home_score"];
    $ascore=  $_POST["away_score"];    
    $hpoint=  $_POST["home_point"];
    $apoint=  $_POST["away_point"];
    $mom=$_POST["mom"];
    $ref=$_POST["referee"];
    $line1=$_POST["linesman1"];
    $line2=$_POST["linesman2"];
    $fourth=$_POST["freferee"];
    
    $h= $hscore-$ascore;
    $a =$ascore-$hscore;
    
    $chk=0;
    
    
    if($ref!=$line1 && $ref!=$line2 && $ref!=$fourth && $line1!=$line2 && $line1!=$fourth && $fourth!=$line2)
    {
	
	if($home!=$away)
	{
	    $db=oci_connect('system','1234','XE');
	    $result=oci_parse($db,"call pro_add_match({$home},{$away},'{$date}-{$month}-{$year}',{$time},{$venue},{$hscore},{$ascore},{$hpoint},{$apoint},{$mom},{$ref},{$line1},{$line2},{$fourth})");
	    oci_execute($result);
	    $result2=oci_parse($db,"call pro_update_points({$home},{$h},{$hpoint})");
	    oci_execute($result2);
	    $result3=oci_parse($db,"call pro_update_points ({$away},{$a},{$apoint})");
	    oci_execute($result3);
	
    
    ?>   
       
	<form class="custom-form" action="match_detail.php?h=<?=$home?>&a=<?=$away?>" method="post">
	    Number of Goals in the Match:<input type="number" name="goal" min="0"> </br>
	    Number of Cards in The Match:<input type="number" name="card" min="0"> </br>
	    <input type="submit" name="submit" class="btn btn-primary"> </br>
	</form>
	<?php
	}
	
	else
	{
		echo "Invalid Input!!!Same Club cannot play against themselves!";
	}
    }
    else
    {
	    echo "Invalid Input!!!A Referee can play only one role at a match!";
    }
	?>
    
    
    

</br>
<a href="admin.php">Go Back</a>

<?php
include("include/adminfooter.php");
?>