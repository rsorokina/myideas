var app = angular.module('app', []);

app.controller('timerController', function($scope,$interval,$http){
    $scope.currentTime = new Date().getTime();
    $scope.nextTime = new Date().getTime() + 3600*1000;
    $scope.courseName = '';
    var getCourse = function() {
        $http.get('/course')
            .then(function(response) {
                $scope.courseName = response.data.courseName;
                $scope.composition = response.data.composition;
            })        
    }
    
    getCourse();
            
    $scope.currentUpdate = function() {
        $scope.currentTime = new Date().getTime();
    }
    
    $scope.nextUpdate = function() {
        $scope.nextTime = new Date().getTime() + 3600*1000;
        
        getCourse();
    }
  
    $interval($scope.currentUpdate,1000)
    $interval($scope.nextUpdate,3600*1000)
  
})



