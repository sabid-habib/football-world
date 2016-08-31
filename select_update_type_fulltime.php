<?php
include("include/adminheader.php");

$id= $_GET["id"];


echo("<h1 style=\"text-align: center\">Update Type</h1>");
        
        echo ("Select Update Type of the player who has $id </br>");
        
        
        echo("<a href=\"fulltimeplayer_details.php?id=$id\" class=\"btn btn-primary\">Normal Update </a> </br>");
        echo("<a href=\"fulltime_change.php?id=$id\" class=\"btn btn-primary\">Change Status</a> </br>");


include("include/adminfooter.php");
?>