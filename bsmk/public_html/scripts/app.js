var domain = 'http://yakoff';  
var method;
var route;
angular.module('App', [])
    .service('HttpService', function($http) {             
        this.httprequest = function(callback) {
            var url = domain+route;
            $http({method: method, url: url})
            .then(function(response) {
                if (response.status == 200) callback(response);
            });
        }
    })
    .controller('countryController', function($scope, HttpService) {
        $scope.h1='Country';
        method = 'get';
        route = '/api/v2/countries';
        HttpService.httprequest(function(response){
            $scope.status = response.status;
            $scope.data = response.data;
        });
    })
    .controller('carController', function($scope, HttpService) {
        $scope.h1='Car';
        method = 'get';
        route = '/api/v2/trucks';
        HttpService.httprequest(function(response){
            $scope.status = response.status;
            $scope.data = response.data;
        });
    });

