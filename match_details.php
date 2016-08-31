<?php
include("include/adminheader.php");
?>


<h1 style="text-align: center">Club Information</h1>

<?php
$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$sql= "select * from matches where match_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$hid = $row[1];
$aid = $row[2];
$sid = $row[3];
$hs= $row[4];
$as= $row{5};
$mom =$row{8};
echo("<form class=\"custom-form\"action=\"updateclubs.php\" method=\"post\"> 
     Home Club ID: <input type=\"text\" name=\"nid\" value=\"{$hid}\" readonly> </br>
     Away Club ID:<input type=\"text\" name=\"nname\" value=\"{$aid}\" required></br>
     Home Score:<input type=\"text\" name=\"nowner\" value=\"{$sid}\" required></br>
     Away Score:<input type=\"text\" name=\"nowner\" value=\"{$sid}\" required></br>
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
echo("<a href=\"deletematches.php?id={$id}\" class= \"btn btn-danger\" onclick=\"return confirm(\'Are you sure you want to search Google?\')\">Delete</a> </form></br></br> ");



?>




 
 
 


<?php
include("include/adminfooter.php");
?>
    