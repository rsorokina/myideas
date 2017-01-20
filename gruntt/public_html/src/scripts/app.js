
var app = angular.module('app', []);
//angular.module('App', [])
    app.controller('TestController', function($scope, $http) {
        var domain = 'http://yakoff';
        var route = '/api/v2/trucks';
        var method = 'get';
        var httprequest = function() {
            var url = domain+route;
            $http({method: method, url: url})
            .then(function(response) {
              $scope.status = response.status;
              $scope.data = response.data;
            }, function(response) {
              $scope.data = response.data || 'Request failed';
              $scope.status = response.status;
            });
        }

        $scope.h1='Test';
        httprequest();
        
        
        
    });

