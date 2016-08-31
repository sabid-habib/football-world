<?php
include("include/adminheader.php");
?>


<?php
    $goal=$_POST['goal'];
    $card=$_POST['card'];
    $home=$_GET['h'];
    $away=$_GET['a'];
?>   

<form class= "custom-form" action="match_stat.php?g=<?=$goal?>?&c=<?=$card?>" method="POST">

<?php

    //match_stat.php?g={$goal};
    //GLOBAL $goal;

    for($x=1;$x<=$goal;$x++){ ?>
	
            Goal Scorer<?=$x?>:
	    <select name="goal<?=$x?>">
                <?php 
                      $conn = oci_connect("system", "1234", "xe");
                      $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,fulltime_players f,clubs c where p.player_id=f.player_id and c.club_id=f.club_id and f.club_id= {$away}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {
			echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. "   - " .$row[3]. "</option> </br>";
                      }
                     $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,parttime_players pt,clubs c where p.player_id=pt.player_id and c.club_id=pt.loanee_club_id and pt.loanee_club_id={$away}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {
			$a=$row[3];
			echo "$a";
			echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. "   - " .$row[3]. "</option> </br>";
                      }
                    $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,fulltime_players f,clubs c where p.player_id=f.player_id and c.club_id=f.club_id and f.club_id= {$home}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result)) 
                      {             echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. "   - " .$row[3]. "</option> </br>";
                      }
		    $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,parttime_players pt,clubs c where p.player_id=pt.player_id and c.club_id=pt.loanee_club_id and pt.loanee_club_id= {$home}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. "   - ". $row[3] ."</option> </br>";
                      }
                  ?>
                  ?>
            </select><br>
	    Time:<input type="number" name="tog<?=$x?>"> </br>
            Assist By:
	    <select name="assist<?=$x?>">
                <?php 
                      $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,fulltime_players f,clubs c where p.player_id=f.player_id and c.club_id=f.club_id and f.club_id= {$away}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {
			echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - " .$row[3]. "</option> </br>";
                      }
                     $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,parttime_players pt,clubs c where p.player_id=pt.player_id and c.club_id=pt.loanee_club_id and pt.loanee_club_id={$away}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {
			$a=$row[3];
			echo "$a";
			echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - " .$row[3]. "</option> </br>";
                      }
                    $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,fulltime_players f,clubs c where p.player_id=f.player_id and c.club_id=f.club_id and f.club_id= {$home}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result)) 
                      {             echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - " .$row[3]. "</option> </br>";
                      }
		    $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,parttime_players pt,clubs c where p.player_id=pt.player_id and c.club_id=pt.loanee_club_id and pt.loanee_club_id= {$home}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - ". $row[3] ."</option> </br>";
                      }
                  ?>
                  ?>
            </select><br><br>
	    
                    
    <?php } 
    $Y='Yellow';
    $R='Red';
    for($x=1;$x<=$card;$x++){ ?>
	    
            Card Showed to:
	    <select name="card<?=$x?>">
                <?php 
                      $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,fulltime_players f,clubs c where p.player_id=f.player_id and c.club_id=f.club_id and f.club_id= {$away}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {
			echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - " .$row[3]. "</option> </br>";
                      }
                     $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,parttime_players pt,clubs c where p.player_id=pt.player_id and c.club_id=pt.loanee_club_id and pt.loanee_club_id={$away}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {
			$a=$row[3];
			echo "$a";
			echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - " .$row[3]. "</option> </br>";
                      }
                    $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,fulltime_players f,clubs c where p.player_id=f.player_id and c.club_id=f.club_id and f.club_id= {$home}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result)) 
                      {             echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - " .$row[3]. "</option> </br>";
                      }
		    $sql = "select p.player_id,p.pfirst_name,p.plast_name,c.club_name from players p,parttime_players pt,clubs c where p.player_id=pt.player_id and c.club_id=pt.loanee_club_id and pt.loanee_club_id= {$home}";
                      $result = oci_parse($conn, $sql);
                      oci_execute($result);
                      while ($row = oci_fetch_array($result))
                      {             echo "<option value= " .$row[0].  " >" . $row[1] ." " .$row[2]. " - ". $row[3] ."</option> </br>";
                      }
                  ?>
		  </select><br>
	   
            Card type:
	    <select name="cardtype<?=$x?>">
                <?php 
                      echo "<option value= ".$Y." >" .$Y. "</option> </br>";
		      echo "<option value= ".$R." >" .$R. "</option> </br>";
                  ?>
		  </select><br>
	    
                    
    <?php } ?>
    <input class="btn btn-primary" type="submit" name="submit"> </br>
</form>

<?php
include("include/adminfooter.php");
?>