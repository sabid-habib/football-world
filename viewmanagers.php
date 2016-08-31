<?php
include("include/adminheader.php");
?>

<?php

echo("<h1 style= \"text-align: center\">Managers Of the League </h1><br><br>");
echo("
     <form \"form-search\" action=\"search_manager.php\" method=\"post\" >
      <div class=\"input-append\" style=\" float:right; margin-bottom:5px;\">
        <select name=\"catagory\" class=\"btn\"  style=\"background: black;color: white; width: 140px\">
        <option value=\"mfirst_name\" >First Name</option>
        <option value=\"mlast_name\">Last Name</option>
        <option value=\"nationality\">Nationality</option>
        <option value=\"club_name\">Club Name</option>
        </select>
        <input name=\"param\" class=\"span2\" id=\"appendedInputButtons\" type=\"text\" style=\"background: black;color: white;\" required>
        <button class=\"btn\" type=\"submit\" style=\"background: black;color: white;\">GO!</button>
        
      </div>
    </form>");
$param = $_GET["param"];
            $db = oci_connect('system','1234','xe');
            $sql="select managers.manager_id, managers.mfirst_name, managers.mlast_name,clubs.club_name, manager_club_contract.contract_start, manager_club_contract.contract_deadline, manager_club_contract.salary, managers.nationality, managers.date_of_birth from managers 
                  join manager_club_contract on managers.manager_id = manager_club_contract.manager_id
                  join clubs on manager_club_contract.club_id = clubs.club_id order by {$param}"; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                        <th><a href=\"viewmanagers.php?param=manager_id\">Manager ID</a></th>
                        <th><a href=\"viewmanagers.php?param=mfirst_name\">First Name</a></th>
                        <th><a href=\"viewmanagers.php?param=mlast_name\">Last Name</a></th>
                        <th><a href=\"viewmanagers.php?param=club_name\">Club</a></th>
                        <th><a href=\"viewmanagers.php?param=contract_start\">Contract Start</a></th>
                        <th><a href=\"viewmanagers.php?param=contract_deadline\">Contract End</a></th>
                        <th><a href=\"viewmanagers.php?param=salary\">Salary</a></th>
                        <th><a href=\"viewmanagers.php?param=nationality\">Nationality</a></th>
                        <th><a href=\"viewmanagers.php?param=date_of_birth\">Date of Birth</a></th>
                        </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td><a href=\"manager_details.php?id={$row[0]}\">  {$row[0]} </a></td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                <td>  {$row[3]}</td>
                                <td>  {$row[4]}</td>
                                <td>  {$row[5]}</td>
                                <td>  {$row[6]}</td>
                                <td>  {$row[7]}</td>
                                <td>  {$row[8]}</td>
                                
                            </tr>";  
                        
                        }
            
            echo "</table>";
           
                        
                                
        ?>



<?php
include("include/adminfooter.php");
?>
        
   





