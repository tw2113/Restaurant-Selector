<!doctype html>
<html lang="en-us" class="no-js">
<head>
<meta charset="utf-8" />
	<title>Random Restaurant Selector</title>
<style>
body {background: #FFFEF2; color: #2359FF;}
article {background: #AFBAFF; display:block; border-radius: 15px; margin: 0 auto; padding: 15px; width: 75%; text-align: center;}
h2 {margin-top: 15px; height: 25px;}
.home {background-color: rgb(0,0,0); background-color: rgba(0,0,0,.5); left: 0; margin: 0; padding: 2px; position: absolute; top: 0;}
.home a {color: #fff; text-decoration: none; font-size: 13px;}
#map { border: solid blue 1px; height: 400px; }
</style>
<link rel="stylesheet" href="js/leaflet.css" />
<script src="js/modernizr.custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/leaflet.js"></script>
</head>
<body>
<p class="home"><a href="http://trexthepirate.com" title="Everybody walk the dinosaur">Home</a></p>
	<article>
	<p id="cords"></p>
	<h1>Where should I go for lunch today?</h1>
	<h2 id="dining"></h2>
	<p>Refresh to see another option.</p>
	<div id="map"></div>
	<script>
			navigator.geolocation.getCurrentPosition(letseat);
			function letseat(position) {
				var lat = position.coords.latitude;
        		var lon = position.coords.longitude;
        		$.getJSON(
	        		"https://api.foursquare.com/v2/venues/explore?ll="+lat+","+lon+"&client_id=D3AWZJT3V5FMQ1H44NCINRX2STZM0UYPJAWWKID1P3FPI0YQ&client_secret=5LC0V5XKCF0BO1HZTJCXMDESV4IMXWSBFRNMM0J3SFH5UPBH&radius=3218&limit=40&section=food&v=20120120", function(data){
        			var dine = [];
        			console.log(data);
        			for(var i = 0; i < data.response.groups[0].items.length; i++) {
        	    		dine.push({
	        	    		name: data.response.groups[0].items[i].venue.name,
	        	    		lat: data.response.groups[0].items[i].venue.location.lat,
	        	    		lng: data.response.groups[0].items[i].venue.location.lng,
	        	    		addr: data.response.groups[0].items[i].venue.location.address,
	        	    	});
        	    	};
        	    	var rand = Math.floor(Math.random()*11);
        	    	if(rand <= dine.length) {
        	    		$("#dining").html(dine[rand].name);
        	    	}
        	    var map = new L.Map('map', {scrollWheelZoom: false});
				var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/44407b1aa8c04d79b5771f52fdee1a32/997/256/{z}/{x}/{y}.png';

				cloudmadeAttrib = 'trexthepirate.com';
				cloudmade = new L.TileLayer(cloudmadeUrl, {minZoom: 7, maxZoom: 14, attribution: cloudmadeAttrib});
				latlong = new L.LatLng(lat, lon);
				restaurant = new L.LatLng(dine[rand].lat,dine[rand].lng);
				map.setView(latlong, 12).addLayer(cloudmade);

				var me = new L.Marker(latlong);
				map.addLayer(me);
				me.bindPopup("You are here").openPopup();
				var eat = new L.Marker(restaurant);
				eat.bindPopup('<p>'+dine[rand].name+'<br/>'+dine[rand].addr+'</p>');
				map.addLayer(eat);
        		});
			}
	</script>
	<p>Restaurant data provided by Foursquare Recommended/Popular Venues</p>
    <p>Source at: <a href="https://github.com/tw2113/Restaurant-Selector" title="Restaurant Selector Github Repo">Github</a></p>
	</article>

<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-5073546-5']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
</body>
</html>
