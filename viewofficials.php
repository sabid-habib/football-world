<?php
include("include/adminheader.php");
?>

<?php
echo("<h1 style= \"text-align: center\">Officials Of the League</h1><br><br>");
echo("
     <form \"form-search\" action=\"search_official.php\" method=\"post\" >
      <div class=\"input-append\" style=\" float:right; margin-bottom:5px;\">
        <select name=\"catagory\" class=\"btn\"  style=\"background: black;color: white; width: 140px\">
        <option value=\"first_name\" >First Name</option>
        <option value=\"last_name\">Last Name</option>
        <option value=\"nationality\">Nationality</option>
        <option value=\"qualification\">Qualification</option>
        </select>
        <input name=\"param\" class=\"span2\" id=\"appendedInputButtons\" type=\"text\" style=\"background: black;color: white;\" required>
        <button class=\"btn\" type=\"submit\" style=\"background: black;color: white;\">GO!</button>
        
      </div>
    </form>");
$param = $_GET["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select official_id, first_name, last_name, nationality, salary, qualification, date_of_birth from officials order by {$param} "; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               <th><a href=\"viewofficials.php?param=official_id\">Official Id</a></th>
                               <th><a href=\"viewofficials.php?param=first_name\">First Name</a></th>
                               <th><a href=\"viewofficials.php?param=last_name\">Last Name</a></th>
                               <th><a href=\"viewofficials.php?param=nationality\">Nationality</a></th>
                               <th><a href=\"viewofficials.php?param=salary\">Salary</a></th>
                               <th><a href=\"viewofficials.php?param=qualification\">Qualification</a></th>
                               <th><a href=\"viewofficials.php?param=date_of_birth\">Date of Birth</a></th>
                               </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td><a href=\"official_details.php?id={$row[0]}\">  {$row[0]} </a></td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                <td>  {$row[3]}</td>
                                <td>  {$row[4]}</td>
                                <td>  {$row[5]}</td>
                                <td>  {$row[6]}</td>
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>



<?php
include("include/adminfooter.php");
?>
        
   





