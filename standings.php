<?php
include("include/visitorheader.php");
?>



<?php
echo("<h1 style= \"text-align: center\">League Standings</h1><br><br><br>");


            $db = oci_connect('system','1234','xe');
            $sql="select * from clubs order by points desc, goal_diffrence desc";
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
                        
                        
                        echo ("<table class = \"table table-bordered\" style= \"text-align:center; background: black;color:white; border-radius:10px\" >");
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
                               
                        
                               
                        while($row=oci_fetch_array($result))
                        {
                            
                        
                        $sqlw =  "select count(*) from matches where (home_id= {$row[0]} and home_points=3) or (away_id= {$row[0]} and away_points=3)";    
                        $resultw =oci_parse($db,$sqlw);			                             		                              
                        oci_execute($resultw);
                        $w=oci_fetch_array($resultw);
                        $sqld =  "select count(*) from matches where (home_id= {$row[0]} and home_points=1) or (away_id= {$row[0]} and away_points=1)";    
                        $resultd =oci_parse($db,$sqld);			                             		                              
                        oci_execute($resultd);
                        $d=oci_fetch_array($resultd);
                        $sqll =  "select count(*) from matches where (home_id= {$row[0]} and home_points=0) or (away_id= {$row[0]} and away_points=0)";    
                        $resultl =oci_parse($db,$sqll);			                             		                              
                        oci_execute($resultl);
                        $l=oci_fetch_array($resultl);
                        $p =$w[0]+$d[0]+$l[0];
                        $t= ($w[0]*3)+$d[0];
                        $sqlgs =  "select sum(home_score), sum(away_score) from matches where home_id= {$row[0]} ";    
                        $resultgs =oci_parse($db,$sqlgs);			                             		                              
                        oci_execute($resultgs);
                        $gs=oci_fetch_array($resultgs);
                        $sqlgc =  "select sum(home_score), sum(away_score) from matches where away_id= {$row[0]} ";    
                        $resultgc =oci_parse($db,$sqlgc);			                             		                              
                        oci_execute($resultgc);
                        $gc=oci_fetch_array($resultgc);
                        $goal_scored=  $gs[0]+ $gc[1];
                        $goal_conceded= $gs[1]+ $gc[0];
                        $goal_diffrence =$goal_scored- $goal_conceded;
                        
                        
                        
                        echo "<tr>
                                
                                <td>  {$row[1]} </td>
                                <td>  {$p}</td>
                                <td>  {$w[0]}</td>
                                <td>  {$d[0]}</td>
                                <td>  {$l[0]}</td>
                                <td>  {$goal_scored}</td>
                                <td>  {$goal_conceded}</td>
                                <td>  {$goal_diffrence}</td>
            
                                <td>  {$t}</td>
                            </tr>";  
                        
                        }
            
            echo "</table>";
                        
                                
        ?>













<?php
include("include/visitorfooter.php");
?>