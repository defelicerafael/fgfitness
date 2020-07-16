 angular.module("Login",[])
    .directive("login",function(){
        
        return{
            
            restrict: "E",
            templateUrl: 'administracion/directives/login/templates/login.html',
            scope: {
                icono:"@"
                
            },
            controller : function($scope,$location,$http,$timeout,$cookies,$mdDialog){
                
                $cookies.remove("log");
                $cookies.remove("apodo");
                $scope.user = [];
                $scope.user.email ="";
                $scope.user.pass = "";
                $scope.alerta = false;
                $scope.texto = "";
                $scope.log = [];
                $scope.status = [];
                $scope.loading = false;
                
                
                $scope.showAlert = function(ev,textSi,text) {
                    $mdDialog.show(
                      $mdDialog.alert()
                        .parent(angular.element(document.querySelector('#popupContainer')))
                        .clickOutsideToClose(true)
                        .title(textSi)
                        .textContent(text)
                        .ariaLabel('')
                        .ok('Ok, Gracias')
                        .targetEvent(ev)

                    );
                };
                
                $scope.loginEmailPass = function(email,pass){
                    $scope.loading = true;
                    $http({method: 'GET',url: 'server/login.php?email='+email+'&pass='+pass})
                        .then(function successCallback(response) {
                            $scope.log = response.data;
                       //     console.log($scope.log);
                            $scope.status = response.status;
                            $scope.loading = false;
                            $scope.alerta = true;
                            if($scope.log!=="NO"){
                                $scope.texto = "Bienvenida "+$scope.log[0].apodo+" ser\u00e1 redireccionado en breve...";
                                $cookies.put('log', 'si');
                                $cookies.put('apodo', $scope.log[0].apodo);
                                $timeout(function(){
                                    $location.url('/noticias/');
                                },4000);
                             //   console.log($scope.log);
                            }else{
                                $cookies.put('log', 'no');
                                $scope.texto = "No coniciden el email con la contrase\u00F1a...";
                             //   console.log($scope.log);
                            }   
                        }, function errorCallback(response) {
                            $scope.log = response.data;
                            $scope.status = response.status;
                            $scope.loading = false;
                            console.log($scope.log);
                    });
                };
               
            }
        };
    });
        
    
   
  

