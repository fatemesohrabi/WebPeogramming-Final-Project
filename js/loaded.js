var app = angular.module('myApp', []);
console.log("hi");
app.controller('myController', function ($scope, $http) {

 $http.get("../getproductslist.php").then(function (response){
   $scope.products=response.data.records;
   console.log(response.data.records);
});
});


 


