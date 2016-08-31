<?php
include("include/visitorheader.php");
?>
<h1>Leaderboard</h1>
<ul class="nav nav-tabs">
  <li  ><a href="show_best_player_stat.php">Best Player</a></li>
  <li ><a href="show_stadium_stat.php">Popular Venue</a></li>
  <li ><a href="show_goal.php">Top Scorer</a></li>
  <li><a href="show_assist.php">Top Assist</a></li>
  <li class="active"><a href="show_card.php">Most Indisciplined</a></li>
  <li><a href="show_officials_stats.php">Best Officials </a></li>
  
</ul>
<?php



            $db = oci_connect('system','1234','xe');
            $sql="select player_id,count(*) from cards where card_type='Red' group by player_id order by count(*) desc";
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        
                        
                        echo ("<table class = \"table table-bordered\" style= \"text-align:center; background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th>Player Name</a></th>
                               <th>Nationality</a></th>
                               <th>Red Cards</a></th>
                               </tr>";                               
                        while($row=oci_fetch_array($result))
                        {
                            $carder=$row[0];
                            $cards=$row[1];
                            $sql1="select pfirst_name,plast_name,nationality from players where player_id={$carder}";
                            $result1=oci_parse($db,$sql1);
                            oci_execute($result1);
                            while($row1=oci_fetch_array($result1))
                            {
                        echo "<tr>
                                
                                <td>  {$row1[0]} {$row1[1]} </td>
                                <td>  {$row1[2]} </td>
                                <td>  {$cards} </td>            
                            </tr>";
                            }
                        
                        }
            
            echo "</table>";
            
             $sql3="select player_id,count(*) from cards where card_type='Yellow' group by player_id order by count(*) desc";
                        $result3=oci_parse($db,$sql3);			                             		                              
                        oci_execute($result3);
                        
                        
                        echo ("<table class = \"table table-bordered\" style= \"text-align:center; background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th>Player Name</a></th>
                               <th>Nationality</a></th>
                               <th>Yellow Cards</a></th>
                               </tr>";                               
                        while($row2=oci_fetch_array($result3))
                        {
                            $carder=$row2[0];
                            $cards=$row2[1];
                            $sql1="select pfirst_name,plast_name,nationality from players where player_id={$carder}";
                            $result2=oci_parse($db,$sql1);
                            oci_execute($result2);
                            while($row3=oci_fetch_array($result2))
                            {
                        echo "<tr>
                                
                                <td>  {$row3[0]} {$row3[1]} </td>
                                <td>  {$row3[2]} </td>
                                <td>  {$cards} </td>            
                            </tr>";
                            }
                        
                        }
            
            echo "</table>";
                       
                        
                                
        ?>













<?php
include("include/visitorfooter.php");
?>