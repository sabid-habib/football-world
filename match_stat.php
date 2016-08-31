<?php
include("include/adminheader.php");
?>

<?php

    
    $goals=$_GET['g'];
    $cards=$_GET['c'];
    
    for($x=1;$x<=$goals;$x++)
    {
        ${"goal".$x}=$_POST['goal'.$x];
        ${"tog".$x}=$_POST['tog'.$x];
        ${"assist".$x}=$_POST['assist'.$x];
    }
    for($x=1;$x<=$cards;$x++)
    {
        ${"card".$x}=$_POST['card'.$x];
        
        ${"type".$x}=$_POST['cardtype'.$x];
    }
    $db=oci_connect('system','1234','XE');
    for($x=1;$x<=$goals;$x++)
    {
        $result=oci_parse($db,"call pro_add_match_goals(${"goal".$x},${"tog".$x},${"assist".$x})");
        oci_execute($result);
    }
    for($x=1;$x<=$cards;$x++)
    {
        $result=oci_parse($db,"call pro_add_match_cards(${"card".$x},'${"type".$x}')");
        oci_execute($result);
    }
    
    
    
    
?>
</br>
<a href="viewmatches.php?param=match_id">Go Back</a>

<?php
include("include/adminfooter.php");
?>