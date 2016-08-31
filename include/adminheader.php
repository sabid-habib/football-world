<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/menu.css" rel="stylesheet" media="screen">
      
     <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="css/style.css" rel="stylesheet" media="screen">
     
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
  <body >
    
    <div id=header style="background: black; height: 160px">
        <h1 style="margin: 0; padding-top: 15px; color: white; text-align: center">Football World</h1>
        <a class= "btn btn-primary" href="index.php" style="float: right; text-decoration: none; padding: 15px; margin-right: 40px" >Logout</a>
        <div id="awesomemenu"  style="width: 960px; margin: auto; padding-top: 20px; ">
            <?php
                include("include/adminmenu_load.php");
            ?>
        </div>
    </div>
    <div id = "main" style="background: #001940">
    <div id="cont"  >
     