<?php
include("include/adminheader.php");
?>

<?php

  
    $name = $_POST["cname"];
    $owner = $_POST["cowner"];
    $stadium = $_POST["sid"];
    
	$db=oci_connect('system','1234','XE');
	$result=oci_parse($db,"call pro_addclub('{$name}','{$owner}',{$stadium})");
	oci_execute($result);
    //echo $query;
    echo "Information Updated";
    
    
    
?>
</br>
<a href="viewclubs.php?param=club_id">Go Back</a>


<?php
include("include/adminfooter.php");
?>