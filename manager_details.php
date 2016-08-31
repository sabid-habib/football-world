<?php
include("include/adminheader.php");
?>


<h1 style="text-align: center">Manager Information</h1>

<?php
$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$sql= "select managers.manager_id,
        managers.mfirst_name,
        managers.mlast_name,
        clubs.club_id,
        manager_club_contract.contract_start,
        manager_club_contract.contract_deadline,
        manager_club_contract.salary,
        managers.nationality,
        managers.date_of_birth
        from managers 
                  join manager_club_contract on managers.manager_id = manager_club_contract.manager_id
                  join clubs on manager_club_contract.club_id = clubs.club_id where managers.manager_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$fname = $row[1];
$lname = $row[2];
$club = $row[3];
$salary= $row[6];
$nationality = $row[7];



echo("<form class=\"custom-form\"action=\"updatemanagers.php\" method=\"post\"> 
     Manager ID: <input type=\"text\" name=\"id\" value=\"{$id}\" readonly> </br>
     First Name:<input type=\"text\" name=\"fname\" value=\"{$fname}\" required></br>
     last Name:<input type=\"text\" name=\"lname\" value=\"{$lname}\" required></br>
     Nationality:   <input type=\"text\" value={$nationality}  name=\"nationality\" required> </br>
     Salary: $<input type=\"number\" name=\"salary\"  min=\"0\" value={$salary}  required></br>
     Date of Birth:");
     include("include/date_tray.php");
     $sql = 'select * from clubs order by club_name';
    $result = oci_parse($db, $sql);
    oci_execute($result);
    echo( "Club Name:<select name=\"club\"> ");
    while ($row = oci_fetch_array($result))
    {
        if($row[0]==$club)echo "<option value= " . $row[0] .  " selected >" . $row[1] . "</option> </br>";
        else echo "<option value= " . $row[0] .  " >" . $row[1] . "</option> </br>";
    }
     echo("</select>");
     echo("Contract  Start:");
     include("include/date_tray2.php");
     echo("Contract End:");
     include("include/date_tray3.php");
     
    echo("</select> <br> <br>");
    echo("<a href=\"viewmanagers.php?param=manager_id\" class= \"btn btn-inverse\">Back</a> </br></br> ");
    echo("<input type=\"submit\" name=\"submit\" value=\"Update\" class= \"btn btn-primary\"></br></br> ");
    echo("<a href=\"deletemanagers.php?id={$id}\" class= \"btn btn-danger\">Delete</a> </form></br></br> ");



?>




 
 
 


<?php
include("include/adminfooter.php");
?>