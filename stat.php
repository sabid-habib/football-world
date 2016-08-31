<?php
include("include/visitorheader.php");
?>
<ul class="nav nav-tabs">
  <li class="active" ><a href="stat.php">Points Percentage</a></li>
  <li ><a href="winstat.php">Win Percentage</a></li>
  <li ><a href="losestat.php">Lose Percentage</a></li>
  <li ><a href="nationstat.php">Players From Different Nation</a></li>
 
  
</ul>
<div style="background: white; ">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
                                            <script type="text/javascript">
                                            google.load("visualization", "1", {packages:["corechart"]});
                                            google.setOnLoadCallback(drawChart);
                                            function drawChart() {
                                                var jsonData = $.ajax({
                                                    url: "piechart.php",
                                                    dataType:"json",
                                                    async: false
                                                    }).responseText;
                                            var options = {backgroundColor: 'transparent',
                                                
                                                'width':1000,
                                                'height':500,
                                                colors: ['#04B4AE', '#FF00FF', '#0101DF', '#80FF00', '#0A1B2A','#FE2E2E','#FFFF00','#21610B','#DF01D7','#2E9AFE','#FF8000'],
                                                is3D: true
                                           };
                                        var data = new google.visualization.DataTable(jsonData);
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                    chart.draw(data, options);
                                    }
                                </script>
                                <div id="piechart" style=" color:white; width: 900px; height: 500px;"></div>
                                </div>
                                        </div>

</div>
<?php
include("include/visitorfooter.php");
?>