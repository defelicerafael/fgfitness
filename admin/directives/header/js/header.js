 angular.module("Header",[])
    .directive("header",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'directives/header/templates/header.html',
            scope: {
               
            },
            controller : function($scope,$mdSidenav){
                
                $scope.toggleSidenav = buildToggler('closeEventsDisabled');
                function buildToggler(componentId) {
                    return function() {
                        $mdSidenav(componentId).toggle();
                    };
                }

                
            }
        };
    });
        
    
   
  

