<?php
include("include/visitorheader.php");
?>





<?php
echo("<h1 style= \"text-align: center\">Matche Results</h1><br><br><br>");


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
 order by match_date"; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               
                               <th>Match Date</th>
                               <th>Home Club</th>
                               
                               
                               <th>Home Score</th>
                               <th>Away Score</th>
                               <th>Away Club</th>
                               
                               <th>Match Time</th>
                               <th>Stadium</th>
                               <th>Man of Match</th>
                               
                               
                               </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td>  {$row[5]}</td>
                                <td>  {$row[2]}</td>
                                
                                
                                <td>  {$row[9]}</td>
                                <td>  {$row[10]}</td>
                                <td>  {$row[4]}</td>
                                
                                <td>  {$row[6]}</td>
                                <td>  {$row[7]}</td>
                                <td>  {$row[8]}</td>
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>









<?php
include("include/visitorfooter.php");
?>