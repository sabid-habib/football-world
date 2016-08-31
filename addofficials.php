<?php
include("include/adminheader.php");
?>

<h1 style="text-align: center">Officials</h1>
        
        
        
        <form  action="official_info.php" method="post" name="myForm"> 
   <div class="custom-div" style="height: 250px;">
    <div class= "custom-form2" style="float: left">   
        First Name:   <input type="text" placeholder="First Name" name="ofname" required> </br>
        Last Name: <input type="text" placeholder="Last Name" name="olname" required> </br>
        Date of Birth:
        <?php include("include/date_tray.php")?>
        <a href="viewofficials.php?param=official_id" class="btn btn-inverse">Back</a>
         </div>
    <div class= "custom-form2" style="float: right">
        Nationality:   <input type="text" placeholder="Nationality" name="nationality" required> </br>
        Salary: <input type="number" placeholder="Salary" min="0"  name="salary" required> </br>
        Qualification:   <input type="text" placeholder="Qualifiaction" name="qualification" required> </br> 
        <input type="submit" name="submit" class="btn btn-primary" > </br>
        
         </div>
    </div>
    
</form>



 
<?php
include("include/adminfooter.php");
?>    