<?php
include("include/adminheader.php");
?>
        
        <h1 style="text-align: center">Fulltime Players</h1> </br> </br>
       
        
        

        <form  action="fulltime_player_info.php" method="post"  name="myForm">
          <div class="custom-div" style="height: 350px;">
    <div class= "custom-form2" style="float: left">   
            First Name:
            <input type="text" placeholder="First Name"  name="pfname" placeholder="First Name" required>
             Last Name:
              <input type="text" placeholder="Last Name"  name="plname" placeholder="Last Name" required>
            Nationality:   <input type="text" placeholder="Nationality"  name="nationality" required> </br>
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
            Date of Birth:
            <?php include("include/date_tray.php")?>
           
            </div>
    <div class= "custom-form2" style="float: right">
       Salary: $<input type="number" name="salary"  min="0" required></br>
            Contract Started on:
            <?php include("include/date_tray2.php")?>
            Contract Deadline:
            <?php include("include/date_tray3.php")?>
            Buyout Fee: $<input type="number" placeholder="Buyout Fee" min="0" name="buyout" required></br>
            
            
        
            
            <input type="submit" name="submit" class="btn btn-primary"> </br>
            
        </form>
        
        <a href="viewfulltimeplayers.php?param=player_id" class="btn btn-inverse">Back</a>
        
         </div>
    </div>
        
    
<?php
include("include/adminfooter.php");
?>





