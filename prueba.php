<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	 <script src="http://maps.googleapis.com/maps/api/js?v3"></script>
	
</head>
<body>
	
	<h1>Mapa prueba</h1>
	
	 <div id="mapa" style=" width: 700px; height: 500px; background: orange; position:relative; margin:auto">
	 	
	 	
	 </div>



 <script>
	 //AIzaSyD7UAjP3_91WUY4fQy-VJAtYRDj3up0Mz4
	 	
	 	  var divMapa = document.getElementById('mapa');

	 	  
	 	  var gCoder = new google.maps.Geocoder();
	 	   var objInformacion = {
	 	   	      address: 'carrera 8 # 5-20, Tolima, Fresno'
	 	   }
	 	   gCoder.geocode(objInformacion, fn_coder);
	 	   
	 	  function fn_coder(datos)
	 	  {
	 	  	
	 	  	 var coordenadas = datos[0].geometry.location; //objeto latitud y longitud de google
	 	  	   var objConfig = {
	 	   	zoom: 18,
	 	   	center: coordenadas
	 	   	
	 	   }
	 	   var googleMapa = new google.maps.Map(divMapa, objConfig);	
	 	  	
	 	  	 var config = {
	 	  	 	map: googleMapa,
	 	  	 	animation:google.maps.Animation.DROP, //efecto caida para el marcador apenas carge la pagina
	 	  	 	position: coordenadas,
	 	  	 	draggable: true,
	 	  	 	
	 	  	 }
	 	  	 var gMarkerDV = new google.maps.Marker(config)
	 	  	     gMarkerDV.setIcon('flag_start.png') 

	 	  	  var objHTML = {
                      
                   content: '<div> Tu direccion</div>' 
                              

	 	  	  }   
	 	  	  var gIW = new google.maps.InfoWindow( objHTML );
	 	  
              google.maps.event.addListener(gMarkerDV,'click', function(){
                        
                        gIW.open(googleMapa, gMarkerDV);


              }); 

	 	  }
	 	  
	 	//google.maps.event.addDomListener(window, 'load', fn_ok);
	 </script>

</body>
</html>