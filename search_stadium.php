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

$att = $_POST["catagory"];
$src= $_POST["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select * from stadiums where {$att} like '%{$src}%'"; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th>Stadium Id</th>
                               <th>Stadium Name</th>
                               <th>Capacity</th>
                               <th>Street</th>
                               <th>Area</th>
                               <th>City</th></tr>";
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
        
   





