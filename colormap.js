
// add all your code to this method, as this will ensure that page is loaded
AmCharts.ready(function() {			

// create AmMap object
var map = new AmCharts.AmMap();

// set path to images
map.pathToImages = "ammap/images/";


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
