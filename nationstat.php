<?php
include("include/visitorheader.php");
?>
<ul class="nav nav-tabs">
  <li  ><a href="stat.php">Points Percentage</a></li>
  <li ><a href="winstat.php">Win Percentage</a></li>
  <li ><a href="losestat.php">Lose Percentage</a></li>
  <li class="active"><a href="nationstat.php">Players From Different Nation</a></li>
 
  
</ul>
<div style="background: white; ">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
                                            <script type="text/javascript">
                                            google.load("visualization", "1", {packages:["corechart"]});
                                            google.setOnLoadCallback(drawChart);
                                            function drawChart() {
                                                var jsonData = $.ajax({
                                                    url: "nationpiechart.php",
                                                    dataType:"json",
                                                    async: false
                                                    }).responseText;
                                            var options = {backgroundColor: 'transparent',
                                                
                                                'width':1400,
                                                'height':700,
                                                colors: ['#04B4AE', '#FF00FF','#3A2F0B','#FAAC58','#0B3B17','#5858FA','#FE2E2E','#8A0868', '#0101DF','#FA5882','#DF013A','#82FA58','#B40404','#298A08','#0B4C5F','#7401DF','#80FF00', '#0A1B2A','#FE2E2E','#FFFF00','#21610B','#DF01D7','#2E9AFE'],
                                                is3D: true
                                           };
                                        var data = new google.visualization.DataTable(jsonData);
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                    chart.draw(data, options);
                                    }
                                </script>
                                            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
                                            
                                            
                                            
                                <div id="piechart" style=" color:white; width: 1000px; height: 800px;"></div>
                                </div>
                                        </div>

</div>
<?php
include("include/visitorfooter.php");
?>