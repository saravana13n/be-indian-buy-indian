// function getPerson(id) {
//     for( var i=0;i<personArray.length;i++) {
//         if(personArray[i].id == id)
//             return personArray[i];
//     }  
//         return {
//             id: "",
//             name: "nf",
//             location: "loc"
//         };
    
// }

ngApp.controller('listController',function($scope,$http){
    $scope.productArray=[];
    $http.get('categories.php').success(function(response){
        $scope.productA=response;
    });
    ajaxUtils.simulate(function(){
        $scope.$apply(function(){
            $scope.productArray=[].concat($scope.productA);
            // $scope.personArray = personArray;
        });
        $('ul.ngRepeat').listview('refresh');
    });
});

ngApp.controller('viewController',function($scope, $routeParams, $location, $http){
    $http({url:'items.php',method:'GET',params:{id:$routeParams.id}}).success(function(response){
        $scope.indianProductArray=response.indian;
        $scope.foreignProductArray=response.foreign;
    });

    ajaxUtils.simulate(function(){
        $scope.$apply(function(){
            $scope.indianProducts=[].concat($scope.indianProductArray);
            $scope.foreignProducts=[].concat($scope.foreignProductArray);
        });
     $('ul.ngRepeat').listview('refresh');
    });
    $scope.delete = function(person) {
        if(confirm("You sure?")) {
            var index = $.inArray(person, personArray);
            personArray.splice(index,1);
            $location.path('/list');
        }
    };
});

