<?php
include("include/adminheader.php");
?>
        
        <h1 style="text-align: center">Part Time Players</h1>
        

        <form  action="parttime_player_info.php" method="post">
            <div class="custom-div" style="height: 420px;">
    <div class= "custom-form2" style="float: left">   
            First Name:   <input type="text" placeholder="First Name"  name="pfname" required> </br>
            Last Name: <input type="text" placeholder="Last Name"  name="plname" required> </br>
            Date of Birth: </br>
            <?php include("include/date_tray.php")?>
            Nationality:   <input type="text" placeholder="Nationality"  name="nationality" required> </br>
            Salary: $<input type="number" placeholder="Salary" min="0" name="salary" required></br>
            <a href="viewparttimeplayers.php?param=player_id" class="btn btn-inverse">Back</a>
            </div>
    <div class= "custom-form2" style="float: right">
            Loaner Club: 
            <select name="loaner_id">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from clubs order by club_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] . "</option> </br>";
                      }
                  ?>
            </select> 
             
            Loanee Club:
            
            <select name="loanee_id">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from clubs order by club_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] . "</option> </br>";
                      }
                  ?>
            </select> 
            
            Loaner Club Contract Started on:
            <?php include("include/date_tray2.php")?>
            Loaner Club Contract Deadline:
            <?php include("include/date_tray3.php")?>
            
            Loanee Club Contract Started on:
            <?php include("include/ldate_tray.php")?>
            Loanee Club Contract Deadline:
            <?php include("include/date_tray5.php")?>
            
        
            
            <input type="submit" name="submit" class="btn btn-primary"> </br>
            
            </div>
    </div>
        </form>

    
        
    
<?php
include("include/adminfooter.php");
?>
