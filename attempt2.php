<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        
		<meta charset="UTF-8">
        
		<title></title>
    
	</head>
    
		<body>
        
			<?php

		            echo  "<h1>This is a header</h1>";
				        $db = oci_connect('system','1234','xe');
				$roll=$_POST["roll"];
				$name=$_POST["name"];
	
            

			
			$sql="insert into STUDENT values(".$roll.",'".$name."')";	
				
            
				 
            $result=oci_parse($db,$sql);
			if($result)echo "success";
			else echo "unsucess";
			oci_execute($result);
            

			?>

	       </body>

</html>
