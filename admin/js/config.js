(function(){
    var app = angular.module('config',['ngRoute']);

    app.config(function($routeProvider,$sceDelegateProvider){
        
        angular.lowercase = angular.$$lowercase;
        //angular.lowercase = text => text.toLowerCase();
      
        $routeProvider
                .when("/",{
                    templateUrl:"templates/login.html",
                    controller:"Ctrl",
                    controllerAs : "ctrl"
                })
                .when("/panel/",{
                    templateUrl:"templates/panel_lista.html",
                    controller:"Ctrl",
                    controllerAs : "ctrl"
                })
                
                .when("/panel/editar/id/:idArt",{
                    templateUrl:"templates/editar.html",
                    controller:"Ctrl",
                    controllerAs : "ctrl"
                })
                .when("/panel/fotos/id/:idArt",{
                    templateUrl:"templates/fotos.html",
                    controller:"Ctrl",
                    controllerAs : "ctrl"
                })
                .when("/panel/stock/id/:idArt",{
                    templateUrl:"templates/stock.html",
                    controller:"Ctrl",
                    controllerAs : "ctrl"
                })
                .otherwise("/");
        
        // use the HTML5 History API
        
        
   
    });
    
})();
