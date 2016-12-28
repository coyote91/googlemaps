<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	
	<script src="http://maps.googleapis.com/maps/api/js?v3"></script>
	
	
</head>
<body>
	
	<h1>Mapa con linea de ruta</h1>
	
	 <div id="mapa" style=" width: 700px; height: 500px; background: orange; position:relative; margin:auto">
	 	
	 	
	 </div>
	
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
	 	  		 animation: google.maps.Animation.DROP,
	 	  		 map: googleMapa,
	 	  		 draggable:true,
	 	  		 tittle: "Estais aquí"
	 	  		 
	 	  	}
	 	   var gMarker = new google.maps.Marker(objConfigMarker);
	 	       gMarker.setIcon('flag_start.png')
	 	
	 	   
	 	   var gCoder = new google.maps.Geocoder();
	 	   var objInformacion = {
	 	   	  
	 	   	  address: 'carrera 4 # 5-20, Tolima, Fresno'
	 	   	  
	 	   	
	 	   }

          gCoder.geocode(objInformacion, fn_coder);
          
          function fn_coder(datos)
          {
          	var coordenadas = datos[0].geometry.location;
          	
          	var config ={
          		
          		map: googleMapa,
          		animation: google.maps.Animation.DROP,
          		position: coordenadas,
          	
          		
          	}
          	
          	var gMarkerDV = new google.maps.Marker(config)
          	    gMarkerDV.setIcon('flag_end.png')
          	
          	var objHTML = {
                      
                   content: '<div> Tu direccion</div>' 
                              

	 	  	  }   
	 	  	  var gIW = new google.maps.InfoWindow( objHTML );
	 	  
              google.maps.event.addListener(gMarkerDV,'click', function(){
                        
                        gIW.open(googleMapa, gMarkerDV);


              }); 
              
           }// end function fn_coder
              
              var objConfigDR = {
              	  
              	  map: googleMapa,
              	  suppressMarkers: true         //eliminar los marcadores que el mapa pone automaticamente en color rojo
              	  
              }
              
              var objConfigDS = {
              	
              	origin: googleLatitudLongitud, 
              	destination: objInformacion.address,   
              	travelMode: google.maps.TravelMode.DRIVING      // driving, bicycling ,transit, walking
              	
              }
              
              var ds = new google.maps.DirectionsService();
              //obtener coordenadas
              
              var dr = new google.maps.DirectionsRenderer(objConfigDR);
              //traduce coordenadas a la ruta visible              
              
              ds.route(objConfigDS, fnRutear);
              
              function fnRutear( resultados, status )
              {
              	 // mostrar la linea entre A Y B
              	/*  if (status == 'ok') {
              	  	
              	  	dr.setDirections(resultados);
              	  	
              	  }
              	  else{
              	  	   alert('Error' + status);
              	  }*/
              	 
              	 
              	 if (status == google.maps.DirectionsStatus.OK) 
              	 {
           dr.setDirections(resultados);
                 }
                 else
                    {
                     alert ('failed to get directions');
                  }
              	
              }
              
              
              
          	
     

              	 	   
	 	   	
	 	  }//end function fn_ok
	 	  
	 	  
	 	  
	 	  
	  
	 	
	 	  
	 	//google.maps.event.addDomListener(window, 'load', fn_ok);
	 </script>

	
</body>
</html>