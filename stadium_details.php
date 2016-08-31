<?php
include("include/adminheader.php");
?>


<h1 style="text-align: center">Official Information</h1>

<?php
$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$sql= "select * from stadiums where stadium_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$name = $row[1];
$capacity = $row[2];
$street = $row[3];
$area= $row[4];
$city= $row[5];

echo("<form class=\"custom-form\"action=\"updatestadiums.php\" method=\"post\"> 
     Stadium ID: <input type=\"text\" name=\"id\" value=\"{$id}\" readonly> </br>
     Stadium Name:<input type=\"text\" name=\"sname\" value=\"{$name}\" required></br>
     Capacity:<input type=\"number\" name=\"capacity\" value=\"{$capacity}\" required></br>
     Street:   <input type=\"text\" value={$street}  name=\"street\" required> </br>
     Area: $<input type=\"text\" value={$area} name=\"area\"  required></br>
     City:   <input type=\"text\" value={$city}  name=\"city\" required> </br>
     
    </select> <br> <br>");
    echo("<a href=\"viewstadiums.php?param=stadium_id\" class= \"btn btn-inverse\">Back</a> </br></br> ");
    echo("<input type=\"submit\" name=\"submit\" value=\"Update\" class= \"btn btn-primary\"></br></br> ");
    echo("<a href=\"deletestadiums.php?id={$id}\" class= \"btn btn-danger\">Delete</a> </form></br></br> ");



?>




 
 
 


<?php
include("include/adminfooter.php");
?>
    