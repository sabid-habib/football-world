<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/menu.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="themes/bar/bar.css" rel="stylesheet" type= "text/css"	 />
     <link href="themes/dark/dark.css" rel="stylesheet" type= "text/css"	/>
     <link href="themes/default/default.css" rel="stylesheet" type= "text/css"	/>
     <link href="themes/light/light.css" rel="stylesheet" type= "text/css"	/>
     <link href="css/nivo-slider.css" rel="stylesheet" type= "text/css"	/>

     
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
  <body >
    <div id=header style="background: black; height: 160px">
        <h1 style="margin: 0; padding-top: 15px; color: white; text-align: center"><i>KiKK'o</i></h1>
        <a class= "btn btn-primary" href="login.php" style="float: right; text-decoration: none; padding: 15px; margin-right: 40px">Login</a>
        <div id="awesomemenu"  style="width: 960px; margin: auto; padding-top: 20px; ">
            <?php
                include("include/menu_load.php");
            ?>
        </div>
    </div>
   
    <div class="slider_area fix">
        <div class="slideer structure fix">
            <div id="wrapper">
           
    
            <div class="slider-wrapper theme-light">
                <div id="slider" class="nivoSlider">
                    <img src="images/banner1.png">
                    <img src="images/banner2.jpg">
                    <img src="images/banner3.jpg">
                    <img src="images/banner4.jpg">
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
                </div>
            </div>
    
            </div>
        </div>
        
    </div>


   
    
    
    
    
    <div id= "footer" style="background: black; height: 50px">
        <p style=" color: white; text-align: center; padding:10px" >Copyright © 2014 Kikko. All rights reserved. The information contained in Kikko may not be published, broadcast, rewritten, or redistributed without the prior written authority of Kikko</p>
        
    </div>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
    $('#slider').nivoSlider();
    });
    </script>

    
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    


  </body>
    
</html>
