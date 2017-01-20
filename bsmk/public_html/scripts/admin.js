var domain = 'http://100kcal';  
var method;
var route;
var params;


angular.module('AppAdmin', [])
    .service('HttpService', function($http) {  
        
        this.httprequest = function(callback) {
            var url = domain+route;
            var headers = new Headers();
            headers.append('Content-Type', 'application/json');
            //headers.append("Access-Control-Allow-Origin", "*");
            //headers.append("Access-Control-Allow-Methods", "GET, POST, OPTIONS, PUT, PATCH, DELETE");
            //headers.append("Access-Control-Allow-Headers", "X-Requested-With,content-type");
            $http.defaults.useXDomain = true;
            delete $http.defaults.headers.common["X-Requested-With"];
            $http({method: method, url: url, data: params, headers: headers})
            .then(function(response) {
                if (response.status == 200) callback(response);
            });
        }
    })
    .controller('moduleController', function($scope, HttpService) {
        $scope.h1='Admin Menu';
        
        $scope.modules = [
            {name: 'Service1', status: true},
            {name: 'Service2', status: false},
            {name: 'Product1', status: false},
            {name: 'Product2', status: true}
        ]
        
        method = 'get';
        route = '/api/v1/getFront';
        HttpService.httprequest(function(response){
            $scope.status = response.status;
            $scope.front = response.data;
        });
        
        $scope.setFront = function() {
            
            //var xhr = new XMLHttpRequest();
//xhr.withCredentials = true;

//xhr.open('POST', 'http://100kcal/api/v1/setFront', true);
//xhr.setRequestHeader('Content-type', 'application/json;');
//xhr.onload = function() {
  //alert( this.responseText );
//}
//var formData = new FormData($scope.front);
//xhr.send("user=user_user&data=15685418");
            method = 'post';
            route = '/api/v1/setFront';

            params = angular.toJson($scope.front)
            HttpService.httprequest(function(response){
                $scope.status = response.status;
                $scope.front = response.data;
            });
        }
    })


