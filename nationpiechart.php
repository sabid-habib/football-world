<?php


$conn = oci_connect('system','1234','xe');
$query="select nationality,count(nationality) from players group by nationality order by count(nationality) desc";
$id=oci_parse($conn,$query);
oci_execute($id);
$rows = array();
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'Item Name', 'type' => 'string'),
    array('label' => 'Percentage', 'type' => 'number')

);

$rows = array();
while($r = oci_fetch_array($id)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['NATIONALITY']); 

    // Values of each slice
    $temp[] = array('v' => (int) $r['COUNT(NATIONALITY)']); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
echo json_encode($table);
?>