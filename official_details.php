<?php
include("include/adminheader.php");
?>


<h1 style="text-align: center">Official Information</h1>

<?php
$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$sql= "select * from officials where official_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$fname = $row[1];
$lname = $row[2];
$nationality = $row[4];
$salary= $row[5];
$qualification= $row[6];

echo("<form class=\"custom-form\"action=\"updateofficials.php\" method=\"post\"> 
     Official ID: <input type=\"text\" name=\"id\" value=\"{$id}\" readonly> </br>
     First Name:<input type=\"text\" name=\"fname\" value=\"{$fname}\" required></br>
     last Name:<input type=\"text\" name=\"lname\" value=\"{$lname}\" required></br>
     Nationality:   <input type=\"text\" value={$nationality}  name=\"nationality\" required> </br>
     Salary: $<input type=\"number\" name=\"salary\" value={$salary} min=\"0\" required></br>
     Qualification:   <input type=\"text\" value={$qualification}  name=\"qualification\" required> </br>
     Date of Birth:");
     include("include/date_tray.php");
    echo("</select> <br> <br>");
    echo("<a href=\"viewofficials.php?param=official_id\" class= \"btn btn-inverse\">Back</a> </br></br> ");
    echo("<input type=\"submit\" name=\"submit\" value=\"Update\" class= \"btn btn-primary\"></br></br> ");
    echo("<a href=\"deleteofficials.php?id={$id}\" class= \"btn btn-danger\">Delete</a> </form></br></br> ");



?>




 
 
 


<?php
include("include/adminfooter.php");
?>
    