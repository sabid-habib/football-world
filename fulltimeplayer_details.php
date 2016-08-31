<?php
include("include/adminheader.php");
?>


<h1 style="text-align: center">Club Information</h1>

<?php
$id= $_GET["id"];


$db = oci_connect('system','1234','xe');
$sql= "select players.player_id,
        players.pfirst_name,
        players.plast_name ,
        clubs.club_name,
        fulltime_players.contract_start,
        fulltime_players.contract_deadline,
        players.salary,
        fulltime_players.buyout_fee,
        players.nationality,
        players.date_of_birth
        from players 
                  join fulltime_players on players.player_id = fulltime_players.player_id
                  join clubs on fulltime_players.club_id = clubs.club_id where players.player_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$fname = $row[1];
$lname = $row[2];
$club = $row[3];
$cstart = $row[4];
$cdeadline = $row[5];
$salary = $row[6];
$buyout = $row[7];
$nationality = $row[8];



echo("<form class=\"custom-form\" action=\"updatefulltimeplayers.php\" method=\"post\"  name=\"myForm\">
            Player Id:
            <input type=\"text\" value={$id}  name=\"id\" readonly>
            First Name:
            <input type=\"text\" value={$fname}  name=\"pfname\" required>
             Last Name:
              <input type=\"text\"   name=\"plname\" value={$lname} required>
            Date of Birth:");
            include("include/date_tray.php");
            echo("Salary: $<input type=\"number\" name=\"salary\" value={$salary} required></br>
            Contract Started on:");
            include("include/date_tray2.php");
            echo("Contract Deadline:");
            include("include/date_tray3.php");
            echo("Buyout Fee: $<input type=\"number\" value={$buyout} name=\"buyout\" required></br>
            Nationality:   <input type=\"text\" value={$nationality}  name=\"nationality\" required> </br>
            Club:<select name=\"club\">");
             
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from clubs order by club_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result)){
                      if($row[0]==$id)echo "<option value= " . $row[0] .  " selected >" . $row[1] . "</option> </br>";
                      else echo "<option value= " . $row[0] .  " >" . $row[1] . "</option> </br>";
                        }
              
            echo("</select> </br>");
        
            
            echo("<a href=\"viewfulltimeplayers.php?param=player_id\" class= \"btn btn-inverse\">Back</a> </br></br> ");
            echo("<input type=\"submit\" name=\"submit\" value=\"Update\" class= \"btn btn-primary\"></br></br> ");
             echo("<a href=\"deletefulltimeplayers.php?id={$id}\" class= \"btn btn-danger\">Delete</a> </form></br></br> ");


?>




 
 
 


<?php
include("include/adminfooter.php");
?>
    
