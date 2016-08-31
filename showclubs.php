<?php
include("include/visitorheader.php");
?>


<h1 style="text-align: center">Club Information</h1>

<?php
$id= $_GET["id"];
$db = oci_connect('system','1234','xe');
$sql= "select * from clubs where club_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$name = $row[1];
$owner = $row[2];
$sid = $row[3];
$sql= "select stadium_name from stadiums where stadium_id={$sid}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$stad = $row[0];
$sql= "select (mfirst_name|| mlast_name), contract_start, contract_deadline as name from managers
join manager_club_contract on manager_club_contract.manager_id= managers.manager_id
join clubs on clubs.club_id = manager_club_contract.club_id where manager_club_contract.club_id={$id}";
$result=oci_parse($db,$sql);
oci_execute($result);
$row=oci_fetch_array($result);
$man = $row[0];
$sqlw =  "select count(*) from matches where (home_id= {$id} and home_points=3) or (away_id= {$id} and away_points=3)";    
                        $resultw =oci_parse($db,$sqlw);			                             		                              
                        oci_execute($resultw);
                        $w=oci_fetch_array($resultw);
                        $sqld =  "select count(*) from matches where (home_id= {$id} and home_points=1) or (away_id= {$id} and away_points=1)";    
                        $resultd =oci_parse($db,$sqld);			                             		                              
                        oci_execute($resultd);
                        $d=oci_fetch_array($resultd);
                        $sqll =  "select count(*) from matches where (home_id= {$id} and home_points=0) or (away_id= {$id} and away_points=0)";    
                        $resultl =oci_parse($db,$sqll);			                             		                              
                        oci_execute($resultl);
                        $l=oci_fetch_array($resultl);
                        $p =$w[0]+$d[0]+$l[0];
                        $t= ($w[0]*3)+$d[0];
                        $sqlgs =  "select sum(home_score), sum(away_score) from matches where home_id= {$id} ";    
                        $resultgs =oci_parse($db,$sqlgs);			                             		                              
                        oci_execute($resultgs);
                        $gs=oci_fetch_array($resultgs);
                        $sqlgc =  "select sum(home_score), sum(away_score) from matches where away_id= {$id} ";    
                        $resultgc =oci_parse($db,$sqlgc);			                             		                              
                        oci_execute($resultgc);
                        $gc=oci_fetch_array($resultgc);
                        $goal_scored=  $gs[0]+ $gc[1];
                        $goal_conceded= $gs[1]+ $gc[0];
                        $goal_diffrence =$goal_scored- $goal_conceded;




echo("
     <div class=\"custom-div\" style=\"min-height: 600px;word-spacing:2px; background:black ;padding:30px;\">
        
        <div  class=\"custom-form3\" style=\"word-spacing:3px; padding:30px;\">
        <div style=\"float:left\">
        <h4>Club Name: $name <br><br>
        Club Owner: $owner <br><br>
        Home Ground:$stad <br><br></h4>
        </div>
        <div style=\"float:right\">
        <h4>
        Club Manager: $man  <br><br>
        Contract Start: $row[1]<br><br>
        Contract End: $row[2] <br><br>
        </h4>
        </div>
        </div>
       
        <div style=\"\">
        <table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >
        <tr>
                               <th>Club Name</a></th>
                               <th>Played</a></th>
                               <th>Win</a></th>
                               <th>Draw</a></th>
                               <th>Lose</a></th>
                               <th>Goal Scored</a></th>
                               <th>Goal Conceded</a></th>
                               <th>Goal Diffrence</a></th>
                               
                               
                               <th>Points</a></th>
                               
                               
                               </tr>
                               <tr>
                                
                                <td>  {$name} </td>
                                <td>  {$p}</td>
                                <td>  {$w[0]}</td>
                                <td>  {$d[0]}</td>
                                <td>  {$l[0]}</td>
                                <td>  {$goal_scored}</td>
                                <td>  {$goal_conceded}</td>
                                <td>  {$goal_diffrence}</td>
            
                                <td>  {$t}</td>
                            </tr>
    </div>
    
     <div>
     <table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >
        <tr>
                               <th>Full Time Player Name</th>
                               <th>Contract Start</th>
                               <th>Contract End</th>
                               </tr>
     
    
     
     ");
     
     
     
     $s ="select (pfirst_name||' '||plast_name) as name, contract_start, contract_deadline from fulltime_players 
join players on players.player_id= fulltime_players.player_id
where club_id=$id";


     $result=oci_parse($db,$s);
    oci_execute($result);
    while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td>  {$row[0]} </td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                </tr>";  
                        
                        }
            
            echo "</table>
            </div>
            
            <div>
            <table class = \"table table-bordered\" style= \"background: black;color:white; border-radius:10px\" >
            <tr>
                               <th>Part Time Player Name </th>
                               <th>Contract Start</th>
                               <th>Contract End</th>
                               </tr>
     
    
     
     ";
     
     $s ="select (pfirst_name||' '||plast_name) as name, contract_loanee_start, contract_loanee_deadline from parttime_players 
join players on players.player_id= parttime_players.player_id
where loanee_club_id=$id";


     $result=oci_parse($db,$s);
    oci_execute($result);
    while($row=oci_fetch_array($result))
                        {	
                            
                        echo "<tr>
                                
                                <td>  {$row[0]} </td>
                                <td>  {$row[1]}</td>
                                <td>  {$row[2]}</td>
                                </tr>";
                        
                        }
            
            echo "</table>
            </div>
            </div>";










?>

<?php
include("include/visitorfooter.php");
?>


 
 



    