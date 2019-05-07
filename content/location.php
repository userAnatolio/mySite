<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">	
		<title><?php echo $titlePage ?></title>
		<link rel="stylesheet" href="/css/style.css">
		<link href = "https://fonts.googleapis.com/css?family= Gugi " rel = "stylesheet">
		<script src="/jQuery/jQuery.js"></script>
		<script src="https://api-maps.yandex.ru/2.1/?apikey=04667861-63a6-4e63-bb5b-ad5defc1cb28&lang=ru_RU" type="text/javascript">
    </script>
	<script type="text/javascript">
        ymaps.ready(init);    
        function init(){ 
            var myMap = new ymaps.Map("map", {
                center: [55.76, 37.64],
                zoom: 7
				
            }); 
        }
    </script>
	</head>
	<body>	
	
	<p><button onclick="geoFindMe()">Show my location</button></p>
<div id="out"></div>

<body>
    <div id="map" style="width: 600px; height: 400px"></div>
</body>

	// <script>
// function geoFindMe() {
  // var output = document.getElementById("out");

  // if (!navigator.geolocation){
    // output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    // return;
  // }

  // function success(position) {
    // var latitude  = position.coords.latitude;
    // var longitude = position.coords.longitude;

    // output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

    // var img = new Image();
    // img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

    // output.appendChild(img);
  // };

  // function error() {
    // output.innerHTML = "Unable to retrieve your location";
  // };

  // output.innerHTML = "<p>Locating…</p>";

  // navigator.geolocation.getCurrentPosition(success, error);
// }
	// </script>
	
<?php 

echo $_GET['mode'];

?>	
	
	
	
	</body>
</html>