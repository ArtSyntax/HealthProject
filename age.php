<html>

	<head>
	<title>Health Visualization</title>
		<meta http-equiv="Content-Language" content="English" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
   
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		
		<script src="ammap/ammap.js" type="text/javascript"></script>
		<link rel="stylesheet" href="ammap/ammap.css" type="text/css" media="all" />
		<script src="ammap/maps/js/worldLow.js" type="text/javascript"></script>
	
		<?php
			header("Content-Type: text/html; charset=UTF-8");
			 
			$host="localhost";
			$user="root"; // MySql Username
			$pass=""; // MySql Password
			$dbname="health_internship"; // Database Name
			$conn=mysql_connect($host,$user,$pass) or die("Can't connect");
			
			mysql_select_db($dbname) or die(mysql_error()); 

			print "<table border cellpadding=3>";  
			$data = mysql_query("SELECT `Country Code`, `2013`, ` CountryCode_A2` FROM birthexpect_total JOIN country_code WHERE `Country Code`= `CountryCode_A3` AND `2013`<> \"\"") 
			or die(mysql_error()); 
			$rows   = array();
			$temp_1 = array();
			$temp_2 = array();
			while($r = mysql_fetch_assoc($data)) {
				$temp_1 = (string)$r[' CountryCode_A2'];
				$temp_2 = (int)$r['2013'];
				$rows[] = array($temp_1,$temp_2);
			}
			$jsonTable = json_encode($rows);
			//print $jsonTable
		?>
		
		<script>var data = <?php echo $jsonTable; ?>; //sent json to js </script>	
		<script src="js/colormap.js" type="text/javascript"></script>
	</head>
	
	<body>
		<div class="container">
			<div id="wrap" >
			
				<div id="header" >
					<h1><a href="index.php">Health Visualization</a></h1>
					<h2>Nagahama Institute of Bio-Science and Technology</h2>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<h3>Categories </h3>
						<div id="left"> 
							<ul>
							<li><a href="main.php">Home</a></li> 
							<li><a href="pop_total.php">Population Total</a></li>
							<li><a href="pop_growth.php">Population Growth</a></li>
							<li><a href="age.php">Life Expectancy</a></li> 
							<li><a href="death_rate.php">Death Rate</a></li> 
							<li><a href="hiv.php">Prevalence of HIV</a></li> 
							<li><a href="reference.php">Reference</a></li> 
							</ul>
						</div>
					</div>

					<div class="col-sm-9">
						<div id="right"> 
							<h2><a href="#">Life expectancy at birth, total (years) - 2013</a></h2>
							<div class="articles">
								
								<br />
														
								<center><div id="mapdiv" style="width: 100%; height: 70%; background-color:#FAFAFA;"></div></center>
								<i>
									<br>Note 1 - Grey countries are the countries without data. 
									<br>Note 2 - The country doesn't have a value. It mean the value is less than one. 
								</i>
								
								<br /><br />
								Life expectancy at birth indicates the number of years a newborn infant would live if prevailing patterns of mortality at the time of its birth were to stay the same throughout its life. Derived from male and female life expectancy at birth from sources such as: 		
								<br> (1) United Nations Population Division. World Population Prospects, 
								<br> (2) United Nations Statistical Division. Population and Vital Statistics Report (various years), 
								<br> (3) Census reports and other statistical publications from national statistical offices, 
								<br> (4) Eurostat: Demographic Statistics, 
								<br> (5) Secretariat of the Pacific Community: Statistics and Demography Programme, and 
								<br> (6) U.S. Census Bureau: International Database.
								<br><br>
							</div>
						</div>
					</div>
				</div>					
		
				<div id="footer">
					Designed by <a href="https://www.facebook.com/pages/Art-Thunder/749793481806968?ref=tn_tnmn" target="blank">Art Thunder.</a> Internship Health Visualization Project.
					<br>Copyright <a href="http://www.nagahama-i-bio.ac.jp/" target="blank">Nagahama Institute of Bio-Science and Technology.</a> All rights Reserved.	2015			
				</div>
			</div>
		</div>
	</body>
</html>