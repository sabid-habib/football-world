<?php


$db = oci_connect('system','1234','xe');
$sql="select * from clubs order by points desc, goal_diffrence desc";
                        $result=oci_parse($db,$sql);			                             		                              
                        oci_execute($result);
$rows = array();
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'Item Name', 'type' => 'string'),
    array('label' => 'Percentage', 'type' => 'number')

);
$w;
$rows = array();
while($row=oci_fetch_array($result))
                        {
                        
                        $sqlw =  "select count(*) from matches where (home_id= {$row[0]} and home_points=0) or (away_id= {$row[0]} and away_points=0)";    
                        $resultw =oci_parse($db,$sqlw);			                             		                              
                        oci_execute($resultw);
                        $w=oci_fetch_array($resultw);
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $row['CLUB_NAME']); 

    // Values of each slice
    $temp[] = array('v' => (int) $w[0]); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
echo json_encode($table);
?>