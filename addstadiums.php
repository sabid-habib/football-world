<?php
include("include/adminheader.php");
?>

        <h1 style="text-align: center">Stadiums</h1>
        
        
        
        <form  action="stadium_info.php" method="post" name="myForm" ">
          <div class="custom-div" style="height: 250px;">
    <div class= "custom-form2" style="float: left">   
        Stadium Name:   <input type="text" placeholder="Stadium Name" name="sname" required> </br>
        Capacity:   <input type="number" placeholder="Capacity" name="capacity" required> </br>
         Street: <input type="text" placeholder="Street" name="street" required> </br>
        <a href="viewstadiums.php?param=stadium_id" class="btn btn-inverse">Back</a>
        </div>
    <div class= "custom-form2" style="float: right">
     
        Area:   <input type="text" placeholder="Area" name="area" required> </br>
        City:   <input type="text"  placeholder="City" name="city" required> </br>
        <input type="submit" name="submit" class="btn btn-primary"> </br>
        
        </div>
    </div>
    </form>


    

<?php
include("include/adminfooter.php");
?>