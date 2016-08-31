<?php
include("include/adminheader.php");
?>


<h1 style="text-align: center">Club Information</h1>

<?php
$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$sql= "select * from clubs where club_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$name = $row[1];
$owner = $row[2];
$sid = $row[3];

echo("<form class=\"custom-form\"action=\"updateclubs.php\" method=\"post\"> 
     Club ID: <input type=\"text\" name=\"nid\" value=\"{$id}\" readonly> </br>
     Club Name:<input type=\"text\" name=\"nname\" value=\"{$name}\" required></br>
     Club Owner:<input type=\"text\" name=\"nowner\" value=\"{$owner}\" required></br>
     Stadium Id: <select name=\"nsid\"> ");

$sql = 'select * from stadiums order by stadium_name';
$result = oci_parse($db, $sql);
oci_execute($result);
while ($row = oci_fetch_array($result))
{
    if($row[0]==$sid)echo "<option value= " . $row[0] .  " selected >" . $row[1] . "</option> </br>";
    else echo "<option value= " . $row[0] .  " >" . $row[1] . "</option> </br>";
}




echo("</select> <br> <br>");
echo("<a href=\"viewclubs.php?param=club_id\" class= \"btn btn-inverse\">Back</a> </br></br> ");
echo("<input type=\"submit\" name=\"submit\" value=\"Update\" class= \"btn btn-primary\"  onclick=\"return confirm('Are you sure you want to search Google?')\"></br></br> ");
echo("<a href=\"deleteclubs.php?id={$id}\" class= \"btn btn-danger\" onclick=\"return confirm(\'Are you sure you want to search Google?\')\">Delete</a> </form></br></br> ");



?>




 
 
 


<?php
include("include/adminfooter.php");
?>
    