<?php
$conn=oci_connect("system","1234","localhost/xe");
if(!$conn) echo"failed";
else echo"success";
?>