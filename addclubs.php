<?php
include("include/adminheader.php");
?>
        
        <h1 style="text-align: center">Clubs</h1> </br> </br>
        

        
        <form  action="club_info.php" method="post" name="myForm" onsubmit="return validateForm()"> 
         <div class="custom-div" style="height: 200px;">
    <div class= "custom-form2" style="float: left"> 
            Club Name:
            <input type="text" id="clubname" name="cname" placeholder="Club Name" required>
            Club Owner:
            <input type="text" id="clubowner" name="cowner" placeholder="Club Owner" required>
              <a href="viewclubs.php?param=club_id" class="btn btn-inverse">Back</a>
              </div>
    <div class= "custom-form2" style="float: right">
            Stadium Name:
            <select name="sid">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from stadiums order by stadium_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] . "</option> </br>";
                      }
                  ?>
            </select><br>
            <a href="addstadiums.php" style="color: white">Not Available?</a> </br> </br>
            <input type="submit" name="submit" class="btn btn-primary"> </br> </br>
            
            </div>
    </div>
            
    
          </form>
        
        


        
   
<?php
include("include/adminfooter.php");
?>
    
   