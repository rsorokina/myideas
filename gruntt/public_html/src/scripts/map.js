//var app = angular.module('app', ['vsGoogleAutocomplete']);

app.controller('mapCtrl', function($scope) {
    $scope.options = {
      types: ['(cities)'],
      componentRestrictions: { country: 'UA' }
    }
    
    $scope.regionCenters = [
        {id: 'Винница',         to: "в Винницу"},
        {id: 'Днепропетровск',  to: "в Днепропетровск"},
        {id: 'Донецк',          to: "в Донецк"},
        {id: 'Житомир',         to: "в Житомир"},
        {id: 'Запорожье',       to: "в Запорожье"},
        {id: 'Ивано-Франковск', to: "в Ивано-Франковск"},
        {id: 'Киев',            to: "в Киев"},
        {id: 'Кировоград',      to: "в Кировоград"},
        {id: 'Луганск',         to: "в Луганск"},
        {id: 'Луцк',            to: "в Луцк"},
        {id: 'Львов',           to: "в Львов"},
        {id: 'Николаев',        to: "в Николаев"},
        {id: 'Одесса',          to: "в Одессу"},
        {id: 'Полтава',         to: "в Полтаву"},
        {id: 'Ровно', to: "в Ровно"},
        {id: 'Симферополь', to: "в Симферополь"},
        {id: 'Сумы', to: "в Сумы"},
        {id: 'Тернополь', to: "в Тернополь"},
        {id: 'Ужгород', to: "в Ужгород"},
        {id: 'Харьков', to: "в Харьков"},
        {id: 'Херсон', to: "в Херсон"},
        {id: 'Хмельницкий', to: "в Хмельницкий"},
        {id: 'Черкассы', to: "в Черкассы"},
        {id: 'Чернигов', to: "в Чернигов"},
        {id: 'Черновцы', to: "в Черновцы"},
    ]
    
    
    
    
    
    $scope.showMap = function(center) {    
        
        $scope.centerid = center.id + ', Украина';
        
        var mapOptions = {
                zoom: 14,
                zoomControl: true,
                mapTypeControl: false,
                streetViewControl: false,
                scrollwheel: false, //zoom on scroll
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var container = $('.gmap')[0];
        var map = new google.maps.Map(container, mapOptions);        
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();
        
    
        var request = {
            origin: $scope.place, //start
            destination: $scope.centerid, //finish
            travelMode: 'DRIVING'
        };
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
            }
        });
        directionsDisplay.setMap(map);  
    }
    
       
});