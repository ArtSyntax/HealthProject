
<html>

	<head>
	<title>Health Virtualization</title>
		<meta http-equiv="Content-Language" content="English" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		
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
		
		<script>
			// add all your code to this method, as this will ensure that page is loaded
			AmCharts.ready(function() {			
			
			// create AmMap object
			var map = new AmCharts.AmMap();
		
			// set path to images
			map.pathToImages = "ammap/images/";
			var data = <?php echo $jsonTable; ?>;
		
			data.forEach(function(entry) {
				//console.log(entry);
			});
			
			var dataProvider = {
				map: "worldLow",	
				areas:[] 	
			}; 
			
			var color_range = ["#FFEBCC", "#FFD699", "#FFC266", "#FFB84D", "#FFA319", "#FF9900", "#FF7519", "#E65C00", "#B24700", "#662900"];
			
			// find data range
			max_value = data[0][1]
			min_value = data[0][1]
			data.forEach(function(entry) {
				if (entry[1] > max_value)
					max_value = entry[1]; 
				if (entry[1] < min_value)
					min_value = entry[1];
			})
			data_range=Math.floor(max_value-min_value)
			ratio = data_range/10
			
			console.log(min_value,max_value)
			
			//push data to map
			data.forEach(function(entry) {
				if (entry[1] <= min_value+ratio)
					dataProvider.areas.push( { id:entry[0], color:color_range[0], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*2)
					dataProvider.areas.push( { id:entry[0], color:color_range[1], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*3)
					dataProvider.areas.push( { id:entry[0], color:color_range[2], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*4)
					dataProvider.areas.push( { id:entry[0], color:color_range[3], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*5)
					dataProvider.areas.push( { id:entry[0], color:color_range[4], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*6)
					dataProvider.areas.push( { id:entry[0], color:color_range[5], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*7)
					dataProvider.areas.push( { id:entry[0], color:color_range[6], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*8)
					dataProvider.areas.push( { id:entry[0], color:color_range[7], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*9)
					dataProvider.areas.push( { id:entry[0], color:color_range[8], description:entry[1] } )
				else if (entry[1] <= min_value+ratio*10)
					dataProvider.areas.push( { id:entry[0], color:color_range[9], description:entry[1] } )
				
			})
			
			// pass data provider to the map object
			map.dataProvider = dataProvider;

			/* create areas settings
			 * autoZoom set to true means that the map will zoom-in when clicked on the area
			 * selectedColor indicates color of the clicked area.
			 */
			map.areasSettings = {
				autoZoom: true,
				selectedColor: "#A37A00"
			};

			// let's say we want a small map to be displayed, so let's create it
			map.smallMap = new AmCharts.SmallMap();

			// write the map to container div
			map.write("mapdiv");
			});
		</script>
	</head>
	
	
	<body>
			
			
			<div id="wrap">

			<div id="header">
				<h1><a href="#">Health Virtualization</a></h1>
				<h2>Nagahama Institute of Bio-Science and Technology</h2>
			</div>

			<div id="right">

				<h2><a href="#">Life expectancy at birth, total (years) - 2013</a></h2>
				<div class="articles">
					
					<br />
											
					<center><div id="mapdiv" style="width: 100%; height: 70%; background-color:#FAFAFA;"></div></center>
					
					<br /><br />
					
					Life expectancy at birth indicates the number of years a newborn infant would live if prevailing patterns of mortality at the time of its birth were to stay the same throughout its life.
Derived from male and female life expectancy at birth from sources such as: 
					
					<br> (1) United Nations Population Division. World Population Prospects, 
					<br> (2) United Nations Statistical Division. Population and Vital Statistics Report (various years), 
					<br> (3) Census reports and other statistical publications from national statistical offices, 
					<br> (4) Eurostat: Demographic Statistics, 
					<br> (5) Secretariat of the Pacific Community: Statistics and Demography Programme, and 
					<br> (6) U.S. Census Bureau: International Database.
					
					<br><br>
					
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