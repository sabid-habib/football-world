<?php
	$db=oci_connect('system','1234','XE');
	$s=oci_parse($db,"call proc_addstadium(922,'Marcana',70000,'9/A','Birmingham','London')");
	oci_execute($s);
?>