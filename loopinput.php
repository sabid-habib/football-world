<form action="thispage.php" method="POST">
Input: <input type="number" name="in"> </br>
<?php
    $goal=$_POST['goal'];
    $card=$_POST['card'];

    for($x=0;$x<$goal;$x++){ ?>
	
            Goal Scorer: <input type="number" name="goal<?$goal?>"> Time:<input type="number" name="tog<?$goal?>"> </br>
            Assist By: <input type="number" name="assist<?$goal?>"> </br>
                    
    <?php } ?>
    
    for($x=0;$x<$card;$x++){ ?>
	
            Card Showed to: <input type="number" name="card<?$card?>"> Time:<input type="number" name="toc<?$card?>"> </br>
            Card type: <input type="text" name="cardtype"> </br>
                    
    <?php } ?>
</form>