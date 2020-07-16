 angular.module("upload_icon",['ngFileUpload'])
    .directive("uploadIcon",function(){

        return{
            restrict: "E",
            templateUrl: 'directives/uploader/templates/uploader_icon.html',
            scope: {
                titulo:"@",
                direccion :"@", // es la direccion donde van a ir las fotos
                dirimg:"@" // es la direccion donde va a esar la foto


            },
            controller : function(Upload,$scope,$timeout,$http,$route,pasapalabra,$routeParams){
                $scope.insert = [];
                $scope.dir = $scope.direccion;
                $scope.dirI = $scope.dirimg;
                $scope.idArt = "../img/articulos/"+$routeParams.idArt+"/";
            //    console.log("direccion," + $scope.dir, "dirImg,"+$scope.dirimg,$scope.titulo);

                $scope.setDir = function(dir){
                  $scope.dir = dir;
                  $scope.showDirectory(dir);
                };

                    $scope.uploadFiles = function(files, errFiles,dir) {
                //    console.log(files, errFiles,dir,dirimg);
                    $scope.foto = [];
                    $scope.files = files;
                    $scope.errFiles = errFiles;
                        angular.forEach(files, function(file) {

                                file.upload = Upload.upload({
                                    url: 'directives/uploader/server/server_reducir.php',
                                    data: {file: file,'dir':dir}
                                });

                            file.upload.then(function (response) {
                                $timeout(function () {
                                    file.result = response.data;
                                   // console.log(response.data);
                                    $scope.foto = file.result;
                                    $scope.insert.logo = $scope.foto;
                                    pasapalabra.data.id_foto = $scope.foto;
                                   // console.log(pasapalabra.data.id_foto);
                                    });
                            }, function (response) {
                                if (response.status > 0)
                                    $scope.errorMsg = response.status + ': ' + response.data;
                            }, function (evt) {
                                file.progress = Math.min(100, parseInt(100.0 *
                                                         evt.loaded / evt.total));


                            });

                        });
                    //store.DatosFotosGaleria();
                    };
                   
                    
                    $scope.showDirectory = function (){
                        console.log("empieza a mostrar");
                        $http({method: 'POST',url: 'directives/uploader/server/directories.php',data:{dir:$scope.idArt}})
                        .then(function successCallback(response) {
                            $scope.fotosDirectorio = response.data;
                            console.log($scope.fotosDirectorio);
                        }, function errorCallback(response) {
                            $scope.fotosDirectorio = response.data;
                            console.log($scope.fotosDirectorio);
                        });
                    }; 
                    
                    $scope.reload = function(){
                        $route.reload();
                    };
                   
                    $scope.deleteFoto = function (foto){
                  //  console.log(foto);
                        $http.post('directives/uploader/server/borrarFoto.php',{foto:foto})
                        .then(function(data){
                        $scope.borrarError = data;
                      //  console.log(data);
                        $route.reload();
                        });
                    };
            }
        };
    });
