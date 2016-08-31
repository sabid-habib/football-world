Here you can Add match info to your League </br>

<form action="match_info.php" method="post"> 
    Home Team:   <input type="number" name="home"> </br>
    Away Team: <input type="number" name="away"> </br>
    Date of Match: </br>
    Date<input type="number" name="date"> Month:<input type="number" name="month"> Year:<input type="number" name="year"> </br>
    Venue:   <input type="number" name="stadium"> </br>
    Match Time:   <input type="number" name="time"> </br>
    Home Score:<input type="number" name="home_score"> </br>
    Away Score:<input type="number" name="away_score"> </br>
    Home Point:<input type="number" name="home_point"> </br>
    Away Point:<input type="number" name="away_point"> </br>
    Man Of The Match:<input type="number" name="mom"> </br>
    Referee:<input type="number" name="referee"> </br>
    Linesmen:<input type="number" name="linesman1"> <input type="number" name="linesman2"> </br>
    Fourth Referee:<input type="number" name="freferee"> </br>
    <input type="submit" name="submit"> </br>
    
</form>
<form action="match_detail.php" method="post">
	Number of Goals in the Match:<input type="number" name="goal"> </br>
	Number of Cards in The Match:<input type="number" name="home_score"> </br>
	<input type="submit" name="submit"> </br>
</form>

<a href="start.php">Back</a>