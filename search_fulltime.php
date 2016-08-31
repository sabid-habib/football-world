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
$att = $_POST["catagory"];
$src= $_POST["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select players.player_id, players.pfirst_name,players.plast_name ,clubs.club_name, fulltime_players.contract_start, fulltime_players.contract_deadline, players.salary, fulltime_players.buyout_fee, players.nationality, players.date_of_birth from players 
                  join fulltime_players on players.player_id = fulltime_players.player_id
                  join clubs on fulltime_players.club_id = clubs.club_id  where {$att} like '%{$src}%'"; 
                        
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                            <th>Player ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Club</th>
                            <th>Contract Start</th>
                            <th>Contract End</th>
                            <th>Salary</th>
                            <th>Buyout Fee</th>
                            <th>Nationality</th>
                            <th>Date Of Birth</th>
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

