<?php
include("include/adminheader.php");
?>


<h1 style="text-align: center">Club Information</h1>

<?php
$id= $_GET["id"];



$db = oci_connect('system','1234','xe');
$sql= "  select
            players.player_id,
            players.pfirst_name,
            players.plast_name,
            dd.club_name,
            vv.club_name,
            parttime_players.contract_loaner_start,
            parttime_players.contract_loaner_deadline,
            parttime_players.contract_loanee_start,
            parttime_players.contract_loanee_deadline,
            players.salary,
            players.nationality,
            players.date_of_birth
            from players 
                  join parttime_players on players.player_id = parttime_players.player_id
                  join clubs vv on parttime_players.loanee_club_id = vv.club_id
                  join clubs dd on parttime_players.loaner_club_id = dd.club_id
                  where players.player_id={$id}";
                  
                  
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$fname = $row[1];
$lname = $row[2];
$lnclub = $row[3];
$leclub = $row[4];
$lncstart = $row[5];
$lncdeadline = $row[6];
$lecstart = $row[7];
$lecdeadline = $row[8];
$salary = $row[9];
$nationality = $row[10];
$dob=$row[11];




echo("<form class=\"custom-form\" action=\"updateparttimeplayers.php?id={$id}\" method=\"post\"  name=\"myForm\">
            Player Id:
            <input type=\"text\" value={$id}  name=\"id\" readonly>
            First Name:
            <input type=\"text\" value={$fname}  name=\"pfname\" required>
             Last Name:
              <input type=\"text\"   name=\"plname\" value={$lname} required>
            ");
            
            echo("Salary: $<input type=\"number\" name=\"salary\" value={$salary} required></br>
            Loaner Contract Started on:");
            include("include/date_tray2.php");
            echo("Loaner Contract Deadline:");
            include("include/date_tray3.php");
            echo("Loanee Contract Started on:");
            include("include/ldate_tray.php");
            echo("Loanee Contract Deadline:");
            include("include/date_tray5.php");
            echo("Nationality:   <input type=\"text\" value={$nationality}  name=\"nationality\" required> </br>
            Loaner Club:<input type=\"text\" value={$lnclub}  name=\"lnclub\" readonly>
            Loanee Club:<input type=\"text\" value={$leclub}  name=\"leclub\" readonly>");
            echo("<a href=\"viewparttimeplayers.php?param=player_id\" class= \"btn btn-inverse\">Back</a> </br></br> ");
            echo("<input type=\"submit\" name=\"submit\" value=\"Update\" class= \"btn btn-primary\"></br></br> ");
             echo("<a href=\"deletefulltimeplayers.php?id={$id}\" class= \"btn btn-danger\">Delete</a> </form></br></br> ");


?>




 
 
 


<?php
include("include/adminfooter.php");
?>
    
