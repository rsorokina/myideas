

app.controller('timerController',['$scope','$interval',function($scope,$interval){
	$scope.nextDay = new Date('2016-05-31');
  
    $scope.currentDate = new Date();
  
    $scope.displayDiff = function() {
        return $scope.nextDay - $scope.currentDate;
    }
  
    $scope.update = function() {
        $scope.currentDate = new Date();
    }
  
    $interval($scope.update,1000)
  
}])