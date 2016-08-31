<?php
include("include/adminheader.php");
?>

<?php
 echo("<h1 style= \"text-align: center\">Full Time Players</h1><br><br>");
 echo("
     <form \"form-search\" action=\"search_fulltime.php\" method=\"post\" >
      <div class=\"input-append\" style=\" float:right; margin-bottom:5px;\">
        <select name=\"catagory\" class=\"btn\"  style=\"background: black;color: white; width: 140px\">
        <option value=\"pfirst_name\" >First Name</option>
        <option value=\"plast_name\">Last Name</option>
        <option value=\"nationality\">Nationality</option>
        <option value=\"club_name\">Club Name</option>
        </select>
        <input name=\"param\" class=\"span2\" id=\"appendedInputButtons\" type=\"text\" style=\"background: black;color: white;\" required>
        <button class=\"btn\" type=\"submit\" style=\"background: black;color: white;\">GO!</button>
        
      </div>
    </form>");
$param = $_GET["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select players.player_id, players.pfirst_name,players.plast_name ,clubs.club_name, fulltime_players.contract_start, fulltime_players.contract_deadline, players.salary, fulltime_players.buyout_fee, players.nationality, players.date_of_birth from players 
                  join fulltime_players on players.player_id = fulltime_players.player_id
                  join clubs on fulltime_players.club_id = clubs.club_id order by {$param}"; 
                        
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                       
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                            <th><a href=\"viewfulltimeplayers.php?param=player_id\">Player ID</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=pfirst_name\">First Name</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=plast_name\">Last Name</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=club_name\">Club</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=contract_start\">Contract Start</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=contract_deadline\">Contract End</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=salary\">Salary</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=buyout_fee\">Buyout Fee</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=nationality\">Nationality</a></th>
                            <th><a href=\"viewfulltimeplayers.php?param=date_of_birth\">Date Of Birth</a></th>
                            </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td><a href=\"select_update_type_fulltime.php?id={$row[0]}\">  {$row[0]} </a></td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                <td>  {$row[3]}</td>
                                <td>  {$row[4]}</td>
                                <td>  {$row[5]}</td>
                                <td>  {$row[6]}</td>
                                <td>  {$row[7]}</td>
                                <td>  {$row[8]}</td>
                                <td>  {$row[9]}</td>
                             
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>

<?php
include("include/adminfooter.php");
?>

