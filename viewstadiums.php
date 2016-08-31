<?php
include("include/adminheader.php");
echo("<h1 style= \"text-align: center\">Stadiums Of the League</h1><br><br>");
echo("
     <form \"form-search\" action=\"search_stadium.php\" method=\"post\" >
      <div class=\"input-append\" style=\" float:right; margin-bottom:5px;\">
        <select name=\"catagory\" class=\"btn\"  style=\"background: black;color: white; width: 140px\">
        <option value=\"stadium_name\" >Stadium Name</option>
        <option value=\"city\">City</option>
        </select>
        <input name=\"param\" class=\"span2\" id=\"appendedInputButtons\" type=\"text\" style=\"background: black;color: white;\" required>
        <button class=\"btn\" type=\"submit\" style=\"background: black;color: white;\">GO!</button>
        
      </div>
    </form>");

$param = $_GET["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select * from stadiums order by {$param}"; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th><a href=\"viewstadiums.php?param=stadium_id\">Stadium Id</a></th>
                               <th><a href=\"viewstadiums.php?param=stadium_name\">Stadium Name</a></th>
                               <th><a href=\"viewstadiums.php?param=capacity\">Capacity</a></th>
                               <th><a href=\"viewstadiums.php?param=street\">Street</a></th>
                               <th><a href=\"viewstadiums.php?param=area\">Area</a></th>
                               <th><a href=\"viewstadiums.php?param=city\">City</a></th></tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td><a href=\"stadium_details.php?id={$row[0]}\">  {$row[0]} </a></td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                <td>  {$row[3]}</td>
                                <td>  {$row[4]}</td>
                                <td>  {$row[5]}</td>
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>



<?php
include("include/adminfooter.php");
?>
        
   





