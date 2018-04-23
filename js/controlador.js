
app.controller("myCtrl", function($scope, $http){
    //objeto para guardar los datos json
    //$scope.personas;
    $scope.enviar = true;
    $scope.update = false;
    $scope.row = true;
    $scope.personas={};
    //función que se ejecuta con el submit
    $scope.manejador = function(){
        $scope.mensaje = false;
        $scope.mostrar = true;
        $scope.row = false;
        //$scope.flecha = true;
        $http({
            method : "POST",
            url : "php/action.php",
            data : {                
                nombre : $scope.nombre,
                apellido : $scope.apellido,
                email : $scope.email
            }
        }).success(function(data){
           // alert ("se ingresó de manera correcta una nueva persona" + data);
            $scope.personas = data;
            //alert(data);

        }).error(function(){
            alert("ha habido un error")
        });
       
    } //termina la función manejador
    $scope.eliminar = function(id){
        if(id!=null){
        
        $http({
            method : "POST",
            url : "php/eliminar.php",
            data : {                
                id : id
            }
        }).success(function(data){
                    
            $scope.personas = data;
            // $scope.mensaje = data;
           
         }).error(function(){
             alert("ha habido un error")
         });

    } else{
        $scope.mensaje = true;
        $scope.mostrar = false;
        }
    } //termina la función eliminar
    //función para recuperar los datos
    $scope.actualizar = function(id, nombre, apellido, email){
        //alert(id + nombre + apellido + email);
        $scope.id = id;
        $scope.nombre = nombre;
        $scope.apellido = apellido;
        $scope.email = email;
        $scope.enviar = false;
        $scope.update = true;
    }//fin de la función para recuperar datos
    //función para actualizar los datos en la base de datos
    $scope.actualizacion = function(){
        //$scope.mensaje = false;
        //$scope.mostrar = true;
        
        $http({
            method : "POST",
            url : "php/update.php",
            data : {
                id : $scope.id,                
                nombre : $scope.nombre,
                apellido : $scope.apellido,
                email : $scope.email
            }
        }).success(function(data){
            alert ("se actualizaron los datos de manera correcta");
            $scope.personas = data;
            //alert(data);

        }).error(function(){
            alert("ha habido un error");
        });
        $scope.enviar = true;
        $scope.update = false;
    } 
});