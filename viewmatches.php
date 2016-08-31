<?php
include("include/adminheader.php");
?>

<?php
echo("<h1 style= \"text-align: center\">Matches Of the League</h1><br><br><br>");
echo("
     <form \"form-search\" action=\"search_match.php\" method=\"post\" >
      <div class=\"input-append\" style=\" float:right; margin-bottom:5px;\">
        <select name=\"catagory\" class=\"btn\"  style=\"background: black;color: white; width: 140px\">
        <option value=\"h.club_name\" >Home Club</option>
        <option value=\"a.club_name\">Away Club</option>
        <option value=\"stadium_name\">Stadium Name</option>
        <option value=\"pfirst_name||' '||plast_name\">Man of Match</option>
        </select>
        <input name=\"param\" class=\"span2\" id=\"appendedInputButtons\" type=\"text\" style=\"background: black;color: white;\" required>
        <button class=\"btn\" type=\"submit\" style=\"background: black;color: white;\">GO!</button>
        
      </div>
    </form>");
$param = $_GET["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select
            
            match_id,
            h.club_id,
            h.club_name,
            a.club_id,
            a.club_name,
            match_date,
            match_time,
            stadium_name,
            (pfirst_name  ||' '|| plast_name) as name,
            home_score,
            away_score
            
            from matches
join stadiums on matches.stadium_id = stadiums.stadium_id
join clubs h on matches.home_id = h.club_id 
join clubs a on matches.away_id = a.club_id 
join players on players.player_id = matches.mom_id
 order by {$param}"; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th><a href=\"viewmatches.php?param=match_id\">Match ID</a></th>
                               <th><a href=\"viewmatches.php?param=h.club_name\">Home Club</a></th>
                               <th><a href=\"viewmatches.php?param=a.club_name\">Away Club</a></th>
                               <th><a href=\"viewmatches.php?param=stadium_name\">Stadium</a></th>
                               <th><a href=\"viewmatches.php?param=home_score\">Home Score</a></th>
                               <th><a href=\"viewmatches.php?param=away_score\">Away Score</a></th>
                               <th><a href=\"viewmatches.php?param=match_date\">Match Date</a></th>
                              
                               <th><a href=\"viewmatches.php?param=pfirst_name\">Man of Match</a></th>
                               
                               
                               </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td><a href=\"match_details.php?id={$row[0]}\">  {$row[0]} </a></td>
                                <td>  {$row[2]}</td>
                                <td>  {$row[4]}</td>
                                <td>  {$row[7]}</td>
                                <td>  {$row[9]}</td>
                                <td>  {$row[10]}</td>
                                <td>  {$row[5]}</td>
                  
                                <td>  {$row[8]}</td>
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>



<?php
include("include/adminfooter.php");
?>
        
   





