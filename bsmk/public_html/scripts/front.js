var domain = 'http://100kcal';  
var method;
var route;
angular.module('AppFront', [])
    .service('HttpService', function($http) {             
        this.httprequest = function(callback) {
            var url = domain+route;
            $http({method: method, url: url})
            .then(function(response) {
                if (response.status == 200) callback(response);
            });
        }
    })
    .controller('frontController', function($scope, HttpService) {
        $scope.h1='Front Client';
        method = 'get';
        route = '/api/v1/getFront';
        HttpService.httprequest(function(response){
            $scope.status = response.status;
            $scope.front = response.data;
        });
        
    })


