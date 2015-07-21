<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Health Visualization</title>
		<meta http-equiv="Content-Language" content="English" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		
		<style>
			#slidy-container {width: 60%; height: 100%; overflow: hidden;			}
		</style>

		
	</head>
	
	
	<body>
			
			
		<div id="wrap">

			<div id="header">
				<h1><a href="index.php">Health Visualization</a></h1>
				<h2>Nagahama Institute of Bio-Science and Technology</h2>
			</div>

			<div id="right">

				<h2><a href="#">Reference</a></h2>
				<div class="articles">
					Database from <a href="http://www.worldbank.org/" target="_blank">The World Bank.</a> <br>
					World Bank Open Data: free and open access to data about development in countries around the globe.<br>
					The World Bank. (2015). Health. Retrieved from 
					<a href="http://data.worldbank.org/indicator?display=default" target="_blank" >http://data.worldbank.org/indicator?display=default</a>

					<br /><br />
						
					<center><a href="http://www.worldbank.org/" target="_blank">
						<img src="img/world-bank-logo.jpg" height="100%" width="20%">
						</a></center>

					<br><br><br>	
						
					<h2><a href="#">Manipulator</a></h2>
					Project by <a href="http://www.nagahama-i-bio.ac.jp/" target="blank">Nagahama Institute of Bio-Science and Technology.</a><br>
					Examiner: Prof. Hiroshi Nagata<br>
					Developer: Mr.Thanyavuth Akarasomcheep (Art Thunder)
					
					<br /><br />
					
					<center><a href="http://www.nagahama-i-bio.ac.jp/" target="_blank">
						<img src="img/nbio_logo.gif" height="100%" width="20%">
						</a></center>	
					 
					<br /><br /><br />
					
					<center>		
					<div id="slidy-container">
						<figure id="slidy">
							<img src="img/World_Bank_Headquarters.jpg" alt="The World Bank">							
							<img src="img/nbio.jpg" alt="Nagahama Institute of Bio-Science and Technology">
						</figure>
					</div>
					</center>
						
					<br /><br /><br /><br /><br />
				
					
				</div>
			</div>

			<div id="left"> 

				<h3>Categories </h3>
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
			<div style="clear: both;"> </div>

			<div id="footer">
				Designed by <a href="https://www.facebook.com/pages/Art-Thunder/749793481806968?ref=tn_tnmn" target="blank">Art Thunder.</a> Internship Health Visualization Project.
				<br>Copyright <a href="http://www.nagahama-i-bio.ac.jp/" target="blank">Nagahama Institute of Bio-Science and Technology.</a> All rights Reserved.	2015			
			</div>
		</div>
	</body>
</html>

<script>
	var timeOnSlide = 4,
	timeBetweenSlides = 1,
	animationstring = 'animation',
	animation = false,
	keyframeprefix = '',
	domPrefixes = 'Webkit Moz O Khtml'.split(' '),
	pfx = '',
	slidy = document.getElementById("slidy");
	if (slidy.style.animationName !== undefined) { 
		animation = true; }
	if ( animation === false ) {
		for ( var i = 0; i < domPrefixes.length; i++ ) {
			if ( slidy.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
				pfx = domPrefixes[ i ];
				animationstring = pfx + 'Animation';
				keyframeprefix = '-' + pfx.toLowerCase() + '-';
				animation = true;
				break;
			} 
		} 
	}
	if ( animation === false ) {
		// animate using a JavaScript fallback, if you wish
	} 
	else {
		var images = slidy.getElementsByTagName("img"),
		firstImg = images[0],
		imgWrap = firstImg.cloneNode(false);
		slidy.appendChild(imgWrap);
		var imgCount = images.length,
		totalTime = (timeOnSlide + timeBetweenSlides) * (imgCount - 1),
		slideRatio = (timeOnSlide / totalTime)*100,
		moveRatio = (timeBetweenSlides / totalTime)*100,
		basePercentage = 100/imgCount,
		position = 0,
		css = document.createElement("style");
		css.type = "text/css";
		css.innerHTML += "#slidy { text-align: left; margin: 0; font-size: 0; position: relative; width: " + (imgCount * 100) + "%; }";
		css.innerHTML += "#slidy img { float: left; width: " + basePercentage + "%; }";
		css.innerHTML += "@"+keyframeprefix+"keyframes slidy {";
		for (i=0;i<(imgCount-1); i++) {
			position+= slideRatio;
			css.innerHTML += position+"% { left: -"+(i * 100)+"%; }";
			position += moveRatio;
			css.innerHTML += position+"% { left: -"+((i+1) * 100)+"%; }";
		}
		css.innerHTML += "}";
		css.innerHTML += "#slidy { left: 0%; "+keyframeprefix+"transform: translate3d(0,0,0); "+keyframeprefix+"animation: "+totalTime+"s slidy infinite; }";
		document.body.appendChild(css);
	}
</script>