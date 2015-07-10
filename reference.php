<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Health Virtualization</title>
		<meta http-equiv="Content-Language" content="English" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		
		<div>
			<?php
				header("Content-Type: text/html; charset=UTF-8");
				 
				$host="localhost";
				$user="root"; // MySql Username
				$pass=""; // MySql Password
				$dbname="health_internship"; // Database Name
				$conn=mysql_connect($host,$user,$pass) or die("Can't connect");
				
				mysql_select_db($dbname) or die(mysql_error()); 

				print "<table border cellpadding=3>"; 
				$data = mysql_query("SELECT * FROM birthexpect_total") 
				or die(mysql_error()); 
				$rows   = array();
				$temp_1 = array();
				$temp_2 = array();
				$rows[] = array('Country', 'Value');
				while($r = mysql_fetch_assoc($data)) {
					$temp_1 = (string)$r['Country Name'];
					$temp_2 = (int)$r['2013'];
					$rows[] = array($temp_1,$temp_2);
				}
				$jsonTable = json_encode($rows);
			?>

			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
			  google.load("visualization", "1", {packages:["geochart"]});
			  google.setOnLoadCallback(drawRegionsMap);

				function drawRegionsMap() {
				var data = google.visualization.arrayToDataTable(<?php echo $jsonTable; ?>);

				var options = {
					colorAxis: {colors: ['#FFEBCC', '#FFB84D', 'FF9900', 'FF6600']},
					displayMode: 'regions',
                    datalessRegionColor: 'black'
					};
				var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

				chart.draw(data, options);
			  };
			</script>
		</div>	
		
	</head>
	
	
	<body>
			
			
			<div id="wrap">

			<div id="header">
				<h1><a href="#">Health Virtualization</a></h1>
				<h2>Nagahama Institute of Bio-Science and Technology</h2>
			</div>

			<div id="right">

				<h2><a href="#">Reference</a></h2>
				<div class="articles">
					
					Database from <a href="http://www.worldbank.org/" target="_blank">The World Bank.</a> <br>
					World Bank Open Data: free and open access to data about development in countries around the globe.<br>
					The World Bank. (2015). Health. Retrieved from http://data.worldbank.org/indicator?display=default

					
					<br /><br />
						
											
					<center><img src="img/World_Bank_Headquarters.jpg" height="100%" width="90%"></center>
					<br /><br />
					<center><a href="http://www.worldbank.org/" target="_blank">
						<img src="img/world-bank-logo.jpg" height="100%" width="20%">
						</a></center>
						
					<br />
					
					<center><a href="http://www.nagahama-i-bio.ac.jp/" target="_blank">
						<img src="img/nbio_logo.gif" height="100%" width="20%">
						</a></center>	
					 
					<br /><br />
					
					
				</div>
			</div>

			<div id="left"> 

				<h3>Categories </h3>
				<ul>
				<li><a href="index.php">Home</a></li> 
				<li><a href="pop_total.php">Population Total</a></li>
				<li><a href="pop_growth.php">Population Growth</a></li>
				<li><a href="age.php">Life Expectancy</a></li> 
				<li><a href="death_rate.php">Death Rate</a></li> 
				<li><a href="hiv.php">Prevalence of HIV</a></li> 
				<li><a href="reference.php">Reference</a></li> 
				</ul>

			</div>
			<div style="clear: both;"> </div>

			<div id="footer">
				Designed by <a href="https://www.facebook.com/pages/Art-Thunder/749793481806968?ref=tn_tnmn" target="blank">Art Thunder.</a> Internship Health Virtualization Project.
				<br>Copyright <a href="http://www.nagahama-i-bio.ac.jp/" target="blank">Nagahama Institute of Bio-Science and Technology.</a> All rights Reserved.	2015			
			</div>
		</div>
	</body>
</html>