var domain = 'http://yakoff';  
var method;
var route;
angular.module('AppProfile', [])
    .config([function(){
        //console.log("::use::config");
      }])
    .run([function(){
        //console.log("::use::run");
      }])
    .service('HttpService', function($http) {             
        this.httprequest = function(callback) {
            var url = domain+route;
            $http({method: method, url: url})
            .then(function(response) {
                if (response.status == 200) callback(response);
            });
        }
    })
    
    .controller('profileController', function($scope, HttpService) {
        $scope.h1='Profile';
        
        $scope.modules = [
            {name: 'Service1', status: true},
            {name: 'Service2', status: false},
            {name: 'Product1', status: false},
            {name: 'Product2', status: true}
        ]
        
        method = 'get';
        route = '/api/v2/trucks';
        HttpService.httprequest(function(response){
            $scope.status = response.status;
            $scope.data = response.data;
        });
    });

