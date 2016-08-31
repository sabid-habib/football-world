<?php
include("include/visitorheader.php");
?>
<h1>Leaderboard</h1>
<ul class="nav nav-tabs">
  <li class="active" ><a href="show_best_player_stat.php">Best Player</a></li>
  <li ><a href="show_stadium_stat.php">Popular Venue</a></li>
  <li ><a href="show_goal.php">Top Scorer</a></li>
  <li><a href="show_assist.php">Top Assist</a></li>
  <li><a href="show_card.php">Most Indisciplined</a></li>
  <li><a href="show_officials_stats.php">Best Officials </a></li>
  
</ul>

<?php



            $db = oci_connect('system','1234','xe');
            $sql="select mom_id,count(*) from matches group by mom_id order by count(*) desc";
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        
                        
                        echo ("<table class = \"table table-bordered\" style= \"text-align:center; background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th>Player Name</a></th>
                               <th>Nationality</a></th>
                               <th>Man Of The Match Awards</a></th>
                               </tr>";                               
                        while($row=oci_fetch_array($result))
                        {
                            $best=$row[0];
                            $mtc=$row[1];
                            $sql1="select pfirst_name,plast_name,nationality from players where player_id={$best}";
                            $result1=oci_parse($db,$sql1);
                            oci_execute($result1);
                            while($row1=oci_fetch_array($result1))
                            {
                        echo "<tr>
                                
                                <td>  {$row1[0]} {$row1[1]} </td>
                                <td>  {$row1[2]} </td>
                                <td>  {$mtc} </td>            
                            </tr>";
                            }
                        
                        }
            
            echo "</table>";
                        
                                
        ?>













<?php
include("include/visitorfooter.php");
?>