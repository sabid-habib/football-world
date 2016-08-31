<?php
include("include/adminheader.php");
?>

<?php
echo("<h1 style= \"text-align: center\">Clubs Of the League</h1><br><br><br>");
echo("
     <form \"form-search\" action=\"search_club.php\" method=\"post\" >
      <div class=\"input-append\" style=\" float:right; margin-bottom:5px;\">
        <select name=\"catagory\" class=\"btn\"  style=\"background: black;color: white; width: 140px\">
        <option value=\"club_name\" >Club Name</option>
        <option value=\"club_owner\">Club Owner</option>
        <option value=\"stadium_name\">Stadium Name</option>
        </select>
        <input name=\"param\" class=\"span2\" id=\"appendedInputButtons\" type=\"text\" style=\"background: black;color: white;\" required>
        <button class=\"btn\" type=\"submit\" style=\"background: black;color: white;\">GO!</button>
        
      </div>
    </form>");
$param = $_GET["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select club_id, club_name, club_owner, stadium_name from clubs c join stadiums s on c.stadium_id = s.stadium_id order by {$param}"; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th><a href=\"viewclubs.php?param=club_id\">Club ID</a></th>
                               <th><a href=\"viewclubs.php?param=club_name\">Club Name</a></th>
                               <th><a href=\"viewclubs.php?param=club_owner\">Club Owner</a></th>
                               <th><a href=\"viewclubs.php?param=stadium_name\">Stadium Name</a></th>
                               </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td><a href=\"club_details.php?id={$row[0]}\">  {$row[0]} </a></td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                <td>  {$row[3]}</td>
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>



<?php
include("include/adminfooter.php");
?>
        
   





