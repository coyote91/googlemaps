<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	 <script src="http://maps.googleapis.com/maps/api/js?v3"></script>
	
</head>
<body>
	
	<h1>Mapa Interactivo</h1>
	
	 <div id="mapa" style=" width: 700px; height: 500px; background: orange; position:relative; margin:auto">
	 	
	 	
	 </div>
	
</body>
</html>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>

 <script>
	 //AIzaSyD7UAjP3_91WUY4fQy-VJAtYRDj3up0Mz4
	 	
	 	  var divMapa = document.getElementById('mapa');
	 	  //pido ubicacion al usuario
	 	  navigator.geolocation.getCurrentPosition(fn_ok, fn_mal);  //recibio ubicacion 
	 	  function fn_mal()
	 	  {
	 	  	
	 	  	
	 	  }
	 	  function fn_ok(respuesta)
	 	  {
	 	  	var latitud = respuesta.coords.latitude;
	 	  	var longitud = respuesta.coords.longitude;
	 	  	   
	 	  	//la latitud y longitud se convierte luego en un objeto de google
	 	  	
	 	   var googleLatitudLongitud = new google.maps.LatLng(latitud, longitud);
	 	   var objConfig = {
	 	   	zoom: 18,
	 	   	center: googleLatitudLongitud
	 	   	
	 	   	
	 	   }
	 	   var googleMapa = new google.maps.Map(divMapa, objConfig);	
	 	  	
	 	  	var objConfigMarker = {
	 	  		 position: googleLatitudLongitud,
	 	  		 map: googleMapa,
	 	  		 
	 	  	}
	 	   var gMarker = new google.maps.Marker(objConfigMarker);
	 	
	 	   	
	 	  }
	 	  

	 	  
	 	//google.maps.event.addDomListener(window, 'load', fn_ok);
	 </script>

</body>
</html>
