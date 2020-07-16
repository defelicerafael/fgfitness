angular.module('App', ['ngMaterial', 'ngMessages','config','Header','ngAnimate','ngSanitize','Login','ngCookies','textAngular','SqlServices','upload_icon'])

    .factory("pasapalabra", function() {
        return {
          data: []
        };
      }) 
    
    
.controller('Ctrl', function($http,$location,$cookies,SqlEdit,$mdToast,SqlDelete,$route,SqlInsertArray,$routeParams,$mdDialog,$timeout,$scope) {

    var app = this;
    
    app.articulos = [];
    app.articulosL = app.articulos.length;
    app.idArt= $routeParams.idArt;
    app.dir_img = "../../img/articulos/"+$routeParams.idArt+"/";
    
    app.isEditing = false;
    app.colores = [];
    app.modelos = [];
    app.categorias = [];
    app.talles = [];
    app.tamanios = [];
    app.stock = [];
    app.total = []; 
    app.login = $cookies.get('log');
    app.apodo = $cookies.get('apodo');
   // console.log(app.login);
    
    app.showSimpleToast = function(text) {
            $mdToast.show(
            $mdToast.simple()
            .textContent(text)
            .position('bottom right' )
            .hideDelay(3000)
        );
    };
    
    //FOTOS DEL DIRECTORIO //
    
    //Mostrar fotos
    app.showDirectory = function (){
          //  console.log("empieza a mostrar");
            $http({method: 'POST',url: 'directives/uploader/server/directories.php',data:{dir:app.dir_img}})
            .then(function successCallback(response) {
                app.fotosDirectorio = response.data;
               // console.log(app.fotosDirectorio);
            }, function errorCallback(response) {
                app.fotosDirectorio = response.data;
              //  console.log(app.fotosDirectorio);
            });
    }; 
    
    app.showAlert = function(ev,textSi,text) {
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
    
    //Borrar fotos
    app.deleteFoto = function (foto){
        var r = confirm("Esta seguro que desea ELIMINAR esta FOTO?");
            if(r===true){
              $http.post('directives/uploader/server/borrarFoto.php',{foto:foto})
              .then(function(data){
              app.borrarError = data;
            //  console.log(data);
              $route.reload();
              });
            }
        };
    
    app.EditLink = function (datosi,tablai,idi,ev){
            app.isEditing=true;
            var where = 'id';
            var datos = datosi;
            var link = 'server/editLink.php';
            var tabla = tablai;
            var id = idi;
            SqlEdit.async(link,datos,tabla,id,where).then(function(d){
                 app.showAlert(ev,'NOTIFICACI\u00D3N',d);
                 app.isEditing = false;
                 $timeout(function() {
                    $scope.$apply(function() {
                        $location.url('/panel/');
                    });
                }, 2000);
                
                
            });
        };
    // FIN FUNCIONES DEL DIRECTORIO //
    
    app.traerArticulos = function(c){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/traerArticulos.php?id='+c})
                .then(function successCallback(response) {
                    app.articulos = response.data;
                    app.articulosL = app.articulos.length;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    app.articulos.total = 0;
                    angular.forEach(app.articulos,function(value, key){
                       app.sumas_sql_articulos('stock','stock',app.articulos[key].id,key);
                    });
                    
                    
                   // console.log(app.resenias);
                }, function errorCallback(response) {
                    app.articulos = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.traerCategorias = function(c){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/traerCategorias.php?id='+c})
                .then(function successCallback(response) {
                    app.categorias = response.data;
                    app.categoriasL = app.categorias.length;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    console.log(app.categorias);
                }, function errorCallback(response) {
                    app.categorias = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.traerColores = function(c){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/traerColores.php?id='+c})
                .then(function successCallback(response) {
                    app.colores = response.data;
                    app.coloresL = app.colores.length;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    console.log(app.colores);
                }, function errorCallback(response) {
                    app.colores = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.traerTamanios = function(c){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/traerTamanios.php?id='+c})
                .then(function successCallback(response) {
                    app.tamanios = response.data;
                    app.tamaniosL = app.tamanios.length;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    console.log(app.tamanios);
                }, function errorCallback(response) {
                    app.tamanios = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.traerTalles = function(c){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/traerTalles.php?id='+c})
                .then(function successCallback(response) {
                    app.talles = response.data;
                    app.tallesL = app.talles.length;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    console.log(app.talles);
                }, function errorCallback(response) {
                    app.talles = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.traerModelos = function(c){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/traerModelos.php?id='+c})
                .then(function successCallback(response) {
                    app.modelos = response.data;
                    app.modelosL = app.modelos.length;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    console.log(app.modelos);
                }, function errorCallback(response) {
                    app.modelos = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.traerStocks = function(c){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/traerStocks.php?id='+c})
                .then(function successCallback(response) {
                    app.stock = response.data;
                    app.stockL = app.stock.length;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    console.log(app.stock);
                }, function errorCallback(response) {
                    app.stock = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.sumas_sql = function(tabla,columna,articulo){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/sumas.php?tabla='+tabla+'&columna='+columna+'&articulo='+articulo})
                .then(function successCallback(response) {
                    app.total = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    return app.total;
                    console.log(app.total);
                }, function errorCallback(response) {
                    app.total = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    app.sumas_sql_articulos = function(tabla,columna,articulo,key){
      //  console.log(c);
    app.loadingMostrarTodo = true;
        $http({method: 'GET',url: 'server/sumas.php?tabla='+tabla+'&columna='+columna+'&articulo='+articulo})
                .then(function successCallback(response) {
                    app.total[key] = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                    return app.total;
                   // console.log(app.total);
                }, function errorCallback(response) {
                    app.total = response.data;
                    app.status = response.status;
                    app.loadingMostrarTodo = false;
                   //console.log(indu.sliders);
        });
    };
    
    
    
    
    
    app.Edit = function (datosi,tablai,idi,show){
    // console.log(datosi);  
       app.isEditing=true;
       var where = 'id';
       var datos = datosi;
       var link = 'server/edit.php';
       var tabla = tablai;
       var id = idi;
       var show = "1";
       SqlEdit.async(link,datos,tabla,id,where).then(function(d){
            console.log(d);
            app.showSimpleToast(d);
            app.isEditing = false;
            $location.url('/panel/admin');
       });
    };
   app.Delete = function (id,tabla){
           // console.log(id,tabla);
            var r = confirm("Esta seguro que desea ELIMINAR este dato?");
            if(r===true){
            var link = 'server/delete.php';
            var id = id;
            SqlDelete.async(link,id,tabla).then(function(d){
            //console.log(d);
            app.showSimpleToast("Ha BORRADO un dato.");
            $route.reload();
            });
            }
            
        };
    app.insert = function (datos,tabla){
            var datos = datos;
            var link = 'server/insert_array.php';  
            var tabla = tabla;
            var cantidad = cantidad;
            SqlInsertArray.async(link,datos,tabla).then(function(d){
            console.log(d);
            app.showSimpleToast(d);
            $route.reload();
            
            });
        };    



});