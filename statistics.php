<?php
include("include/visitorheader.php");
?>



<?php
echo("<h1 style=\"text-align: center\">Stat Type</h1>");
        
        echo ("Select Which Statistics you want to know </br>");
        
        
        echo("<a href=\"show_goal.php?\" class=\"btn btn-primary\">Goal Scorer List</a> </br></br>");
        echo("<a href=\"show_assist.php?\" class=\"btn btn-primary\">Assist Leaders</a> </br></br>");
        echo("<a href=\"show_card.php?\" class=\"btn btn-primary\">Indisciplined Players</a> </br></br>");
        echo("<a href=\"show_officials_stats.php?\" class=\"btn btn-primary\">Officials List</a> </br></br>");
        echo("<a href=\"show_stadium_stat.php?\" class=\"btn btn-primary\">Stadium Statistics</a> </br></br>");
        echo("<a href=\"show_best_player_stat.php?\" class=\"btn btn-primary\">Best Players</a> </br></br>"); 
        ?>
<?php
include("include/visitorfooter.php");
?>