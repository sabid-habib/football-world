<?php
include("include/visitorheader.php");
?>


<?php
echo("<h1 style= \"text-align: center\">League Standings</h1><br><br><br>");

echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th>Club Name</a></th>
                               <th>Played</a></th>
                               <th>Win</a></th>
                               <th>Draw</a></th>
                               <th>Lose</a></th>
                               <th>Goal Scored</a></th>
                               <th>Goal Conceded</a></th>
                               <th>Goal Diffrence</a></th>
                               <th>Points</a></th>
                               </tr>";
                               
$db = oci_connect('system','1234','xe');
$sql="select club_id from standings
                group by (standings.club_id,year) 
                having year=2014 
                order by sum(points) desc, sum(goal_diffrence) desc";
$result=oci_parse($db,$sql);			                             		                              
oci_execute($result);
while($row=oci_fetch_array($result))
{
    echo("<tr>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         <td>{$row[0]}</td>
         
         
         </tr>");
    
}                               
                               
echo "</table>";
                        
?>



<?php
include("include/visitorfooter.php");
?>