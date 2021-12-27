var app = angular.module('myApp', []);
console.log("hi");
app.controller('myController', function ($scope, $http) {

 $http.get("getproductslist.php").then(function (response){
   $scope.products=response.data.records;
   console.log(response.data.records);
});
$scope.f = function ($id) {
  console.log($id);
 
  window.location.href = "Product.php?Pname="+$id;
};

});
app.controller('myController2', function ($scope, $http) {

  $http.get("getCart.php").then(function (response){
    $scope.products=response.data.records;
    console.log(response.data);
 });
 $scope.fun = function ($id) 
 {
    
    $scope.deleted=$id;
    console.log($id);

    var data = {

      name: $scope.deleted
      
      
      };
    console.log(JSON.stringify(data));
    $http.post('getCartAfterDelete.php',JSON.stringify(data)).then(function (response){
      console.log("meeeeeeeeeee");
      $scope.products=response.data.records;
      console.log(response.data);
      
  });
 }

 
 });


 


