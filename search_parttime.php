<?php
include("include/adminheader.php");
?>

<?php
echo("<h1 style= \"text-align: center\">Part Time Players</h1><br><br>");
echo("
     <form \"form-search\" action=\"search_parttime.php\" method=\"post\" >
      <div class=\"input-append\" style=\" float:right; margin-bottom:5px;\">
        <select name=\"catagory\" class=\"btn\"  style=\"background: black;color: white; width: 140px\">
        <option value=\"pfirst_name\" >First Name</option>
        <option value=\"plast_name\">Last Name</option>
        <option value=\"nationality\">Nationality</option>
        <option value=\"dd.club_name\">Loaner Club </option>
        <option value=\"vv.club_name\">Loanee Club </option>
        </select>
        <input name=\"param\" class=\"span2\" id=\"appendedInputButtons\" type=\"text\" style=\"background: black;color: white;\" required>
        <button class=\"btn\" type=\"submit\" style=\"background: black;color: white;\">GO!</button>
        
      </div>
    </form>");
$att = $_POST["catagory"];
$src= $_POST["param"];
            $db = oci_connect('system','1234','xe');
            $sql="
                        select
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
                              join clubs dd on parttime_players.loaner_club_id = dd.club_id where {$att} like '%{$src}%'"; 
                        
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
        
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo "
                        <tr>
                        <th>Player Id</a></th>
                        <th>First Name</a</th>
                        <th>Last Name</a</th>
                        <th>Loaner Club</a</th>
                        <th>Loanee Club</a</th>
                        <th>Loaner Contract Start</a</th>
                        <th>Loaner Contract End</a</th>
                        <th>Loanee Contract Start</a</th>
                        <th>Loanee Contract End</a</th>
                        <th>Salary</a</th>
                        <th>Nationality</a</th>
                        <th>Date Of Birth</a</th>
                        </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td><a href=\"select_update_type_parttime.php?id={$row[0]}\">  {$row[0]} </a></td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                <td>  {$row[3]}</td>
                                <td>  {$row[4]}</td>
                                <td>  {$row[5]}</td>
                                <td>  {$row[6]}</td>
                                <td>  {$row[7]}</td>
                                <td>  {$row[8]}</td>
                               
                                <td>  {$row[9]}</td>
                                <td>  {$row[10]}</td>
                                <td>  {$row[11]}</td>
                             
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>

<?php
include("include/adminfooter.php");
?>

