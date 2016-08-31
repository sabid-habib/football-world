<?php
include("include/adminheader.php");
?>
 
<h1 style="text-align: center">Match</h1> </br> </br> 

<form  action="match_info.php" method="post"> 
   <div class="custom-div" style="height: 600px;">
    <div class= "custom-form2" style="float: left">   
    Home Team:  
    <select name="home">
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
    Away Team: 
    <select name="away">
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
    Date of Match: </br>
    <?php include("include/date_tray.php")?>
    Venue:  
    <select name="stadium">
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
    Match Time:   <input type="number" name="time" min="0"> </br>
    Home Score:<input type="number" name="home_score" min="0"> </br>
    
    Away Score:<input type="number" name="away_score" min="0"> </br>
    </div>
    <div class= "custom-form2" style="float: right">
    Home Result:
    <select type="number" name="home_point">
    <option value="3">WIN</option><br>
    <option value="1">DRAW</option><br>
    <option value="0">LOSE</option><br>
    </select>
    Away Result:
    <select type="number" name="away_point">
    <option value="3">WIN</option><br>
    <option value="1">DRAW</option><br>
    <option value="0">LOSE</option><br>
    </select>
    Man Of The Match:
    <select name="mom">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from players order by pfirst_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] ." ".$row[2]. "</option> </br>";
                      }
                  ?>
            </select><br>
    Referee:
    <select name="referee">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from officials order by first_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] ." ".$row[2]. "</option> </br>";
                      }
                  ?>
            </select><br>
    Linesmen:
    <select name="linesman1">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from officials order by first_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] ." ".$row[2]. "</option> </br>";
                      }
                  ?>
            </select><br>
    Linesman 2:
    <select name="linesman2">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from officials order by first_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] ." ".$row[2]. "</option> </br>";
                      }
                  ?>
            </select><br>
    Fourth Referee:
    <select name="freferee">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = 'select * from officials order by first_name';
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " . $row[0] .  " >" . $row[1] ." ".$row[2]. "</option> </br>";
                      }
                  ?>
            </select><br>
    <input type="submit" name="submit"  class="btn btn-primary"> </br>
    </div>
    </div>
    
</form>
</br></br>


<a href="admin.php">Back</a>

<?php
include("include/adminfooter.php");
?>