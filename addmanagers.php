<?php
include("include/adminheader.php");
?>

<h1 style="text-align: center">Managers</h1> </br> </br>

 
<form action="manager_info.php" method="post" name="myForm" >
  <div class="custom-div" style="height: 300px;">
    <div class= "custom-form2" style="float: left">
        First Name: <br>  <input type="text" placeholder="First Name" name="mfname" required > </br>
        Last Name: <br> <input type="text" placeholder="Last Name" name="mlname" required> </br>
        Date Of Birth:
        <?php include("include/date_tray.php")?>
        Nationality: <br>  <input type="text" placeholder="Nationality" name="nationality" required> </br>
        <a href="viewmanagers.php?param=manager_id" class="btn btn-inverse">Back</a></br>
        </div>
    <div class= "custom-form2" style="float: right">
        Club:<select name="club">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from clubs order by club_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] . "</option> </br>";
                      }
                  ?>
            </select> </br>
            
        Contract Start: 
         <?php include("include/date_tray2.php")?>
        Contract End:
        <?php include("include/date_tray3.php")?>
        Salary:<br>
        <input type="number" name="salary" min="0" required></br>
        <input type="submit" name="submit" class="btn btn-primary" >
        
    </div>
    </div>
</form>




<?php
include("include/adminfooter.php");
?>
