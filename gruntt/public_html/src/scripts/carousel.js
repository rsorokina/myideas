$(document).ready(function() {
    $('.carousel').carousel();
    
 
});


/*


$('.gmap').each(function(){
  var container = this;

  var mapOptions = {
    zoom: $(container).data('zoom'),
    zoomControl: true,
    mapTypeControl: false,
    streetViewControl: false,
    scrollwheel: false, //zoom on scroll
    draggable: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(container, mapOptions);
  var geocoder = new google.maps.Geocoder();

  geocoder.geocode(
    {'address': 'Одесса, Одесская область, Украина'},
    function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        new google.maps.Marker({
          position: results[0].geometry.location,
          map: map,
          icon: $(container).data('marker')
        });
        map.setCenter(results[0].geometry.location);
      }
    }
  );
  
  
  
  
  
  
  
  
  
  var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();

if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position) {
		var location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		//Выполняем нужную ф-ю при успешной геолокации
	},function() {
		alert("Ошибка геолокации!");
	});
}else{
	alert('Геолокация в Вашем браузере не поддерживается!');
}






var gmapTravelMode = {'DRIVING' : google.maps.DirectionsTravelMode.DRIVING, 'WALKING' : google.maps.TravelMode.WALKING};

jQuery('.show-route').click(function(){
  if (navigator.geolocation) {
    var trmode = $(this).data('travel-mode');
    if(gmapTravelMode.hasOwnProperty(trmode)){
      travelmode = gmapTravelMode[trmode];
    }else{
      travelmode = gmapTravelMode['DRIVING'];
    }
    showRoute(travelmode);
    }else{
    alert('Your browser doesn`t support geolocation');
  }
  
});
jQuery('.clear-route').click(function(){
  directionsDisplay.setMap(null);
  map.setZoom(mapZoom);
  map.setCenter(companyPos);
});


//Показываем путь
function showRoute(travelMode){
  var request = {
    origin: 'Одесса, Одесская область, Украина', //точка старта
    destination: 'Киев, Украина, 02000', //точка финиша
    travelMode: travelMode //режим прокладки маршрута
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
  directionsDisplay.setMap(map);
}

 
  
});

*/
