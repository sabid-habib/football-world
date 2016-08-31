<?php
include("include/visitorheader.php");
?>


<?php
echo("<h1 style= \"text-align: center\">Clubs Of the League</h1><br><br><br>");


            $db = oci_connect('system','1234','xe');
            $sql="select * from clubs"; 
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        //echo $result;
                        
                        echo ("<table class = \"table table-bordered\" style= \"text-align:center; background: black;color:white; border-radius:10px\" >");
                        echo " <tr>
                               
                               <th style= \"text-align:center\">Club Name</a></th>                            
                               </tr>";
                        while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td style= \"text-align:center\" ><a href=\"showclubs.php?id={$row[0]}\">  {$row[1]} </a></td>
                                
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>


<?php
include("include/visitorfooter.php");
?>